<?php

/*
 * HiDev Nginx plugin
 *
 * @link      https://github.com/hiqdev/hidev-nginx
 * @package   hidev-nginx
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2016, HiQDev (http://hiqdev.com/)
 */

namespace hidev\nginx\tests\functional;

use hidev\tests\functional\Tester;

class NginxTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \FunctionalTester
     */
    protected $tester;

    protected function setUp()
    {
        $this->tester = new Tester($this);
        $this->tester->clean = true;
    }

    protected function tearDown()
    {
        $this->tester = null;
    }

    public function testMinimal()
    {
        $this->tester->config(__DIR__ . '/sample/.hidev/config.yml');
        $this->tester->hidev('nginx/dump');
        $this->tester->assertFile('test-a.dev.conf', __DIR__ . '/sample/test-a.dev.conf');
        $this->tester->assertFile('test-b.dev.conf', __DIR__ . '/sample/test-b.dev.conf');
    }
}
