<?php
use think\Container;

$container = Container::getInstance();

include_once $container->getRootPath() . 'unisapp/' . $container->make('request')->app() . '/common.php';
// 应用公共文件
