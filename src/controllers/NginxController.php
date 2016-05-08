<?php

/*
 * HiDev Nginx plugin
 *
 * @link      https://github.com/hiqdev/hidev-nginx
 * @package   hidev-nginx
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2016, HiQDev (http://hiqdev.com/)
 */

namespace hidev\nginx\controllers;

use hidev\base\File;
use hidev\modifiers\Sudo;
use Yii;

/**
 * Goal for Nginx.
 */
class NginxController extends \hidev\controllers\CommonController
{
    use \hiqdev\yii2\collection\ManagerTrait;

    protected $_logDir;
    protected $_etcDir;
    protected $_fpmSocket;

    public $defaultClass = VhostController::class;

    public function actionDump()
    {
        foreach ($this->getItems() as $vhost) {
            $conf = $vhost->renderConf();
            file_put_contents($vhost->getDomain() . '.conf', $conf);
        }
    }

    public function actionDeploy()
    {
        if (!file_exists($this->getEtcDir())) {
            throw new InvalidParamException('Non existing Nginx etcDir: ' . $this->getEtcDir());
        }
        $enabledDir   = $this->getEtcDir() . '/sites-enabled';
        $availableDir = $this->getEtcDir() . '/sites-available';
        $this->mkdir($enabledDir);
        $this->mkdir($availableDir);
        foreach ($this->getItems() as $vhost) {
            $conf = $vhost->renderConf();
            $name = $vhost->getDomain() . '.conf';
            $dest = $enabledDir . '/' . $name;
            $file = File::plain($availableDir . '/' . $name);
            $file->save($conf);
            $file->symlink($enabledDir . '/' . $name);
        }
        $this->actionRestart();
    }

    public function actionRestart()
    {
        return $this->passthru('service', ['nginx', 'restart', Sudo::create()]);
    }

    public static function mkdir($path)
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
        return Yii::createObject($this->getItemConfig($id, $config), [$id, Yii::$app]);
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
        $files = ['/run/php/php7.0-fpm.sock', '/var/run/php5-fpm.sock'];
        foreach ($files as $file) {
            if (file_exists($file)) {
                return $file;
            }
        }

        return reset($files);
    }
}
