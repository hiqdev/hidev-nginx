<?php

/*
 * HiDev Nginx plugin
 *
 * @link      https://github.com/hiqdev/hidev-nginx
 * @package   hidev-nginx
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2016, HiQDev (http://hiqdev.com/)
 */

return [
    'components' => [
        'config' => [
            'nginx' => [
                'class' => 'hidev\nginx\controllers\NginxController',
                'default' => [],
            ],
            'views' => [
                '@hidev/nginx/views',
            ],
        ],
    ],
];
