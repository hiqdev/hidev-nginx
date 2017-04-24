<?php
/**
 * Nginx plugin for HiDev.
 *
 * @see      https://github.com/hiqdev/hidev-nginx
 * @package   hidev-nginx
 * @license   BSD-3-Clause
 * @copyright Copyright (c) 2016-2017, HiQDev (http://hiqdev.com/)
 */

namespace hidev\nginx\tests\functional;

use hidev\tests\functional\Tester;

class NginxTest extends \PHPUnit\Framework\TestCase
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
        $this->tester->config(__DIR__ . '/minimal/.hidev/config.yml');
        $this->tester->hidev('nginx/dump');
        $this->tester->assertFiles(__DIR__ . '/minimal', ['.']);
    }
}
