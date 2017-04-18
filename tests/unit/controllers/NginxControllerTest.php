<?php
/**
 * HiDev Nginx plugin
 *
 * @link      https://github.com/hiqdev/hidev-nginx
 * @package   hidev-nginx
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2016-2017, HiQDev (http://hiqdev.com/)
 */

namespace hidev\nginx\tests\unit\controllers;

use hidev\nginx\controllers\NginxController;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2016-04-14 at 11:42:17.
 */
class NginxControllerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var NginxController
     */
    protected $object;
    protected $ip = '1.1.1.1';

    protected function setUp()
    {
        $this->object = new NginxController('test', null);
    }

    protected function tearDown()
    {
    }

    public function testConstruct()
    {
        $this->assertInstanceOf(NginxController::class, $this->object);
    }
}
