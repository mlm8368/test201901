<?php
// +----------------------------------------------------------------------
// | 应用设置
// +----------------------------------------------------------------------

use think\Container;

$container = Container::getInstance();

return array_merge(include $container->getRootPath() . 'unisapp/' . $container->make('request')->app() . '/config/app.php',[]);