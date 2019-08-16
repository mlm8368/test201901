<?php
use think\Container;

$container = Container::getInstance();

// 容器Provider定义文件
return array_merge(include $container->getRootPath() . 'unisapp/' . $container->make('request')->app() . '/provider.php',[
  // 
]);
