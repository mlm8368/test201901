<?php
$app = app();

// 中间件定义文件
return array_merge(include root_path() . 'unisapp/' . app('request')->app() . '/middleware.php',[
  //
]);
