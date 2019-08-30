<?php
$app = app();

// 容器Provider定义文件
return array_merge(include root_path() . 'unisapp/' . app('request')->app() . '/provider.php',[
  // 
]);
