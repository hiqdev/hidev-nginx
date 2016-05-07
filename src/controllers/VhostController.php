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

    public $ssl;

    protected $_sslPath;
    protected $_ip;
    protected $_domain;
    protected $_webDir;
    protected $_logDir;
    protected $_fpmSocket;

    public function renderConf()
    {
        return $this->nginx->render('default.twig', [
            'this' => $this,
        ]);
    }

    public function setDomain($value)
    {
        $this->_domain = $value;
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
        $this->_ip = $value;
    }

    public function getIp()
    {
        if ($this->_ip === null) {
            $this->_ip = $this->findIp();
        }

        return $this->_ip;
    }

    public function findIp()
    {
        return gethostbyname($this->getDomain()) ?: '127.0.0.1';
    }

    public function setWebDir($value)
    {
        $this->_webDir = $value;
    }

    public function getWebDir()
    {
        if ($this->_webDir === null) {
            $this->_webDir = $this->takeGoal('start')->getRootDir() . '/web';
        }

        return $this->_webDir;
    }

    public function setLogDir($value)
    {
        $this->_logDir = $value;
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

    public function setSslPath($value)
    {
        $this->_sslPath = $value;
    }

    public function getSslPath()
    {
        return Yii::getAlias($this->_sslPath);
    }
}
