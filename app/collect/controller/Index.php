<?php
namespace app\collect\controller;

use app\BaseController;

class Index extends BaseController
{
    public function index($name)
    {
      return 'adddd-'.$name;
    }
}
