<?php
/**
 * Nginx plugin for HiDev.
 *
 * @link      https://github.com/hiqdev/hidev-nginx
 * @package   hidev-nginx
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2016-2017, HiQDev (http://hiqdev.com/)
 */

error_reporting(-1);
date_default_timezone_set('UTC');

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

use hiqdev\composer\config\Builder;
use yii\console\Application;

Yii::$app = new Application(require Builder::path('tests'));
