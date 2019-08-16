<?php
use think\Container;

$container = Container::getInstance();

// 中间件定义文件
return array_merge(include $container->getRootPath() . 'unisapp/' . $container->make('request')->app() . '/middleware.php',[
  //
]);
