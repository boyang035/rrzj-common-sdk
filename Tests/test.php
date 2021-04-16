<?php
require_once './vendor/autoload.php'; // 加载自动加载文件
use rrzj\common\Eleme;
$eleme = new Eleme([
    'app_key' => 'entadmin',
    'secret' => '6879hsdhj4323nmn32j3jn23n44j',
    'debug'  => true,

]);
var_dump($eleme->user->getUser([]));
