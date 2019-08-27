<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2019 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace unis\app;

use think\App;

class Request extends \think\Request
{
  public function __construct(){
    parent::__construct();
  }

  public static function __make(App $app)
  {
    $request = parent::__make($app);

    //var_dump($request->cookie);

    return $request;
  }
}