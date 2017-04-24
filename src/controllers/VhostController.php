<?php
/**
 * Nginx plugin for HiDev.
 *
 * @see      https://github.com/hiqdev/hidev-nginx
 * @package   hidev-nginx
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2016-2017, HiQDev (http://hiqdev.com/)
 */

namespace hidev\nginx\controllers;

use hidev\modifiers\Sudo;
use Yii;

/**
 * Goal for Nginx virtual host.
 */
class VhostController extends \hidev\controllers\CommonController
{
    /**
     * @var NginxController
     */
    public $nginx;

    /**
     * @var integer
     */
    public $timeout;

    public $ssl;

    public $_aliases = [];

    protected $_sslDir;
    protected $_ips = [];
    protected $_localIps = [];
    protected $_domain;
    protected $_webDir;
    protected $_logDir;
    protected $_fpmSocket;
    protected $_additionalConfig;

    public function actionChmodSsl()
    {
        $dir = $this->getSslDir();
        $this->passthru('chown', ['-R', 'www-data', $dir, Sudo::create()]);
        $this->passthru('chgrp', ['-R', 'www-data', $dir, Sudo::create()]);
        $this->passthru('chmod', ['-R', 'o-rwx',    $dir, Sudo::create()]);
    }

    public function renderConf()
    {
        return $this->nginx->render('default.twig', [
            'this' => $this,
        ]);
    }

    public function setDomain($value)
    {
        $this->_domain = trim($value);
    }

    public function setDomains($domains)
    {
        if (!is_array($domains)) {
            $domains = preg_split('/[\s,]+/', trim($domains));
        }
        $this->_domain = array_shift($domains);
        $this->_aliases = $domains;
    }

    public function getDomain()
    {
        if ($this->_domain === null || $this->_domain === 'default') {
            $this->_domain = $this->takePackage()->name;
        }

        return $this->_domain;
    }

    public function setIp($value)
    {
        $this->_ips = [$value];
    }

    public function setIps($value)
    {
        $this->_ips = is_array($value) ? array_unique($value) : [$value];
    }

    public function getIps()
    {
        if (empty($this->_ips)) {
            $this->_ips = $this->findIps();
        }

        return $this->_ips;
    }

    public function findIps()
    {
        $ips = gethostbyname($this->getDomain());
        if ($ips === $this->getDomain()) {
            $ips = '';
        }

        return [$ips ?: '127.0.0.1'];
    }

    public function setLocalIps($value)
    {
        $this->_localIps = is_array($value) ? array_unique($value) : [$value];
    }

    public function getLocalIps()
    {
        if (empty($this->_localIps)) {
            $this->_localIps = $this->ssl ? ['127.0.0.1'] : $this->getIps();
        }

        return $this->_localIps;
    }

    public function setWebDir($value)
    {
        $this->_webDir = Yii::getAlias($value);
    }

    public function getWebDir()
    {
        if ($this->_webDir === null) {
            $this->_webDir = $this->takeGoal('start')->buildRootPath('web');
        }

        return $this->_webDir;
    }

    public function setLogDir($value)
    {
        $this->_logDir = Yii::getAlias($value);
    }

    public function getLogDir()
    {
        if ($this->_logDir === null) {
            $this->_logDir = $this->nginx->getLogDir();
        }

        return $this->_logDir;
    }

    public function setFpmSocket($value)
    {
        $this->_fpmSocket = $value;
    }

    public function getFpmSocket()
    {
        if ($this->_fpmSocket === null) {
            $this->_fpmSocket = $this->nginx->getFpmSocket();
        }

        return $this->_fpmSocket;
    }

    public function setSslDir($value)
    {
        $this->_sslDir = Yii::getAlias($value);
        if ($this->_sslDir[0] !== '/') {
            $this->_sslDir = $this->takeGoal('start')->buildRootPath($this->_sslDir);
        }
    }

    public function getSslDir()
    {
        if ($this->_sslDir === null) {
            $this->_sslDir = $this->takeGoal('start')->buildRootPath('ssl');
        }

        return $this->_sslDir;
    }

    public function setAliases($aliases)
    {
        if (!is_array($aliases)) {
            $aliases = preg_split('/[\s,]+/', trim($aliases));
        }
        $this->_aliases = $aliases;
    }

    public function getAliases()
    {
        return $this->_aliases;
    }

    public function getDomains()
    {
        $domains = $this->getAliases();
        array_unshift($domains, $this->getDomain());

        return $domains;
    }

    public function getServerName()
    {
        return implode(' ', $this->getDomains());
    }

    public function getAdditionalConfig()
    {
        return $this->_additionalConfig;
    }

    public function setAdditionalConfig($additinalConfig)
    {
        $this->_additionalConfig = $additinalConfig;
    }
}
