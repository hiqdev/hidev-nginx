<?php
/**
 * HiDev plugin for NGINX.
 *
 * @link      https://github.com/hiqdev/hidev-nginx
 * @package   hidev-nginx
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2016-2017, HiQDev (http://hiqdev.com/)
 */

namespace hidev\nginx\components;

use Exception;
use hidev\base\File;
use hidev\modifiers\Sudo;
use Yii;

/**
 * nginx component.
 */
class Nginx extends \hidev\base\Component
{
    use \hiqdev\yii2\collection\ManagerTrait;

    protected $_logDir;
    protected $_etcDir;
    protected $_fpmSocket;

    public $defaultClass = Vhost::class;

    public function dump()
    {
        foreach ($this->getItems() as $vhost) {
            $conf = $vhost->renderConf();
            File::plain($vhost->getDomain() . '.conf')->save($conf);
        }
    }

    public function deploy()
    {
        $etcDir = $this->getEtcDir();
        if (!is_dir($etcDir)) {
            throw new InvalidParamException("Non existing Nginx etcDir: $etcDir");
        }
        $enabledDir   = $etcDir . DIRECTORY_SEPARATOR . 'sites-enabled';
        $availableDir = $etcDir . DIRECTORY_SEPARATOR . 'sites-available';
        static::mkdir($enabledDir);
        static::mkdir($availableDir);
        foreach ($this->getItems() as $vhost) {
            $conf = $vhost->renderConf();
            $name = $vhost->getDomain() . '.conf';
            $file = File::plain($availableDir . DIRECTORY_SEPARATOR . $name);
            $file->save($conf);
            $file->symlink($enabledDir . DIRECTORY_SEPARATOR . $name);
        }
        $this->restart();
    }

    public function start()
    {
        return $this->run('start');
    }

    public function stop()
    {
        return $this->run('stop');
    }

    public function Reload()
    {
        return $this->run('reload');
    }

    public function Restart()
    {
        return $this->run('restart');
    }

    public function Status()
    {
        return $this->run('status', false);
    }

    public function run($operation, $sudo = true)
    {
        $args = ['nginx', $operation];
        if ($sudo) {
            array_push($args, Sudo::create());
        }

        return $this->passthru('service', $args);
    }

    public function letsencrypt()
    {
        foreach ($this->getItems() as $vhost) {
            $domain = $vhost->getDomain();
            $sslDir = $vhost->getSslDir();
            $args = ['certonly', '-a', 'webroot', '--webroot-path=' . $vhost->getWebDir()];
            foreach (array_reverse($vhost->getDomains()) as $name) {
                array_push($args, '-d');
                array_push($args, $name);
            }
            if ($this->passthru('/opt/letsencrypt/letsencrypt-auto', $args)) {
                throw new Exception('failed letsencrypt');
            }
            static::mkdir($sslDir);
            $this->passthru('sh', ['-c', "cp /etc/letsencrypt/live/$domain/* $sslDir", Sudo::create()]);
            $vhost->chmodSSL();
        }
    }

    public function chmodSSL()
    {
        foreach ($this->getItems() as $vhost) {
            $vhost->chmodSSL();
        }
    }

    private static function mkdir($path)
    {
        if (file_exists($path)) {
            return true;
        }

        return mkdir($path, 0777, true);
    }

    /**
     * Prepares item config.
     */
    public function getItemConfig($name = null, array $config = [])
    {
        return array_merge([
            'domain' => $name,
            'nginx'  => $this,
            'class'  => $this->defaultClass,
        ], $config);
    }

    public function createItem($id, $config = [])
    {
        return Yii::createObject($this->getItemConfig($id, $config));
    }

    public function setLogDir($value)
    {
        $this->_logDir = $value;
    }

    public function getLogDir()
    {
        if ($this->_logDir === null) {
            $this->_logDir = '/var/log/nginx';
        }

        return $this->_logDir;
    }

    public function setEtcDir($value)
    {
        $this->_etcDir = $value;
    }

    public function getEtcDir()
    {
        if ($this->_etcDir === null) {
            $this->_etcDir = $this->findEtcDir();
        }

        return $this->_etcDir;
    }

    public function findEtcDir()
    {
        $dirs = ['/etc/nginx', '/usr/local/etc/nginx'];
        foreach ($dirs as $dir) {
            if (is_dir($dir)) {
                return $dir;
            }
        }

        return reset($dirs);
    }

    public function setFpmSocket($value)
    {
        $this->_fpmSocket = $value;
    }

    public function getFpmSocket()
    {
        if ($this->_fpmSocket === null) {
            $this->_fpmSocket = 'unix:' . $this->findFpmSocketFile();
        }

        return $this->_fpmSocket;
    }

    public function findFpmSocketFile()
    {
        $files = [
            '/run/php/php7.1-fpm.sock',
            '/run/php/php7.0-fpm.sock',
            '/var/run/php5-fpm.sock',
            '/tmp/php-fpm.sock',
        ];
        foreach ($files as $file) {
            if (file_exists($file)) {
                return $file;
            }
        }

        return reset($files);
    }
}
