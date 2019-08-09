<?php
namespace unis\app\collect\controller;

use think\App;
use app\BaseController;

class Index extends BaseController
{
    /**
     * 构造方法
     * @access public
     * @param  App  $app  应用对象
     */
    public function __construct(App $app)
    {
        parent::__construct($app);
    }

    public function index($name)
    {
      $res = 'adddd-'.$name;
      $str = testUnisCommon();
      $url = url('index/index',['name'=>'eeeee']);
      return $res.$url.$str;
    }
}
