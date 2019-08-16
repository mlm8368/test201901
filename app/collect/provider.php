<?php
$app = app();

// 容器Provider定义文件
return array_merge(include $app->getRootPath() . 'unisapp/' . $app->make('request')->app() . '/provider.php',[
  // 
]);
