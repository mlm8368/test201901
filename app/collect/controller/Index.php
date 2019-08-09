<?php
namespace app\collect\controller;

use app\BaseController;

class Index extends BaseController
{
    public function index($name)
    {
      $res = 'adddd-'.$name;
      $url = url('index/index',['name'=>'eeeee']);
      return $res.$url;
    }
}
