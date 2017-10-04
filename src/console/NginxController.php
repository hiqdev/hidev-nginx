<?php
/**
 * HiDev plugin for NGINX
 *
 * @link      https://github.com/hiqdev/hidev-nginx
 * @package   hidev-nginx
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2016-2017, HiQDev (http://hiqdev.com/)
 */

namespace hidev\nginx\console;

/**
 * NGINX management.
 */
class NginxController extends \hidev\base\Controller
{
    public $defaultAction = 'dump';

    public function actionDump()
    {
        return $this->getComponent()->dump();
    }

    public function actionDeploy()
    {
        return $this->getComponent()->deploy();
    }

    public function actionLetsencrypt()
    {
        return $this->getComponent()->letsencrypt();
    }

    public function actionStart()
    {
        return $this->getComponent()->start();
    }

    public function actionStop()
    {
        return $this->getComponent()->stop();
    }

    public function actionReload()
    {
        return $this->getComponent()->reload();
    }

    public function actionRestart()
    {
        return $this->getComponent()->restart();
    }

    public function actionStatus()
    {
        return $this->getComponent()->status();
    }

    public function getComponent()
    {
        return $this->take('nginx');
    }
}
