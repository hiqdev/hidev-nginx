<?php
/**
 * Nginx plugin for HiDev.
 *
 * @see      https://github.com/hiqdev/hidev-nginx
 * @package   hidev-nginx
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2016-2017, HiQDev (http://hiqdev.com/)
 */

return [
    'controllerMap' => [
        'nginx' => [
            'class' => \hidev\nginx\console\NginxController::class,
        ],
    ],
    'components' => [
        'nginx' => [
            'class' => \hidev\nginx\components\Nginx::class,
            'default' => [],
        ],
        'views' => [
            '@hidev/nginx/views',
        ],
    ],
];
