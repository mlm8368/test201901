<?php
namespace app\collect\controller;

use think\App;
use unis\app\collect\controller\Index as UnisIndex;

class Index extends UnisIndex
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
      $data = parent::index($name);
      $res = 'adddd-'.$name.$data;
      return $res;
    }

    public function testgraphql(){
      $data = parent::testgraphql();

      return json($data['graphql']);
    }

    public function testdb($id=0){
      $data = parent::testdb($id);

      return response(print_r($data,true));
    }
}
