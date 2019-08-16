<?php
$app = app();

// 事件定义文件，追加操作
return array_merge_recursive(include root_path() . 'unisapp/' . app('request')->app() . '/event.php',[
  //
]);
