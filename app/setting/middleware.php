<?php
$app = app();

// 中间件定义文件
return array_merge(include $app->getRootPath() . 'unisapp/' . $app->make('request')->app() . '/middleware.php',[
  //
]);
