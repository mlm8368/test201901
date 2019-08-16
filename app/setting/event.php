<?php
use think\Container;

$container = Container::getInstance();

// 事件定义文件，追加操作
return array_merge_recursive(include $container->getRootPath() . 'unisapp/' . $container->make('request')->app() . '/event.php',[
  //
]);
