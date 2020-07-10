<?php
/**
 * HiDev plugin for NGINX
 *
 * @link      https://github.com/hiqdev/hidev-nginx
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
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@hidev/views' => [dirname(__DIR__) . '/src/views'],
                ],
            ],
        ],
    ],
];
