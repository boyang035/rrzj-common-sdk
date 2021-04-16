<?php
namespace rrzj\common\Tests;

use PHPUnit\Framework\TestCase;
use rrzj\common\CommonServer;

class TestUser extends TestCase
{
    /**
     * 测试 Test用户模块
     */
    public function testGetUser()
    {
        $commonServer = new CommonServer([
            'app_key' => 'entadmin',
            'secret' => '6879hsdhj4323nmn32j3jn23n44j',
            'debug'  => false,
        ]);
        $params = ['a'=>1,'b'=>2];
        $result = $commonServer->user->getUser($params);
        $result = json_decode($result,true);
        $this->assertArrayHasKey('result', $result);
    }
}