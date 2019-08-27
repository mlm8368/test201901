<?php
namespace unis\app\collect\controller;

use think\App;
use app\BaseController;
use GraphQL\Type\Schema;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\GraphQL;
use unis\graphql\Support\Types;
use unis\graphql\Support\ObjectType;
use think\facade\Db;


class Index extends BaseController
{
    protected $isGraphql = 1;
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
      session('userid', 'dddd');
      $res = 'adddd-'.$name;
      $str = testUnisCommon();
      $url = url('index/index',['name'=>'eeeee']);
      return $res.$url.$str;
    }

    public function testgraphql(){
      $result = ['data'=>[],'graphql'=>''];

      $result['data'] = ['id'=>1,'nickname'=>'sss','created_time'=>'2018-09-01 23:08:00'];

      if($this->isGraphql){
        $query = new ObjectType([
          'name'=>'archoneType',
          'description'=>'档案信息3',
          'fields'=>[
            'archone'=>[
              'type'=>Types::archive(),
              'resolve'=>function($val, $args) use ($result){
                return $result['data'];
              }
            ],
            'archone2'=>[
              'type'=>Types::archive(),
              'resolve'=>function($val, $args) use ($result){
                return $result['data'];
              }
            ]
          ]
        ]);
        $schemaTypes = ['query' => $query];
        $schema = new Schema($schemaTypes);
        $result['graphql'] = GraphQL::executeQuery($schema, $this->request->post('query'), [], [], $this->request->post('variables'))->toArray();
      }

      return $result;
    }

    public function testdb($id=0){
      $list = Db::table('sx_check_record')->where('id', 1)->find();
      // var_dump($list);
      return $list;
    }
}
