<?php
namespace app\api\controller;

use think\App;
use unis\app\api\controller\Query as UnisQuery;

class Query extends UnisQuery
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

    public function main($action='multiple')
    {
      $data = parent::main($action);

      return json($data['graphql']);
    }
}
