<?php
$app = app();

// 事件定义文件，追加操作
return array_merge_recursive(include $app->getRootPath() . 'unisapp/' . $app->make('request')->app() . '/event.php',[
  //
]);
