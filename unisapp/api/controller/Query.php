<?php
namespace unis\app\api\controller;

use think\App;
use app\BaseController;
use GraphQL\Type\Schema;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\GraphQL;
use unis\graphql\Support\Types;
use unis\graphql\Support\ObjectType;
use think\facade\Db;


class Query extends BaseController
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

    public function main($action='multiple')
    {
      $result = ['data'=>[],'graphql'=>''];

      $result['data'] = ['id'=>1,'nickname'=>'sss','created_time'=>'2018-09-01 23:08:00'];

      if($this->isGraphql){
        $queryType = [
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
              'args'=>[
                'flag'=>[
                  'type'=>Types::boolean(),
                  'defaultValue'=>false
                ]
              ],
              'resolve'=>function($val, $args) use ($result){
                return $result['data'];
              },
              'deprecationReason'=>'not use'
            ],
            'archone3'=>[
              'type'=>Types::archive(),
              'deprecationReason'=>'not use'
            ]
          ]
        ];
        $schemaTypes = ['query' => new ObjectType($queryType)];
        $schema = new Schema($schemaTypes);
        $result['graphql'] = GraphQL::executeQuery($schema, $this->request->post('query'), [], [], $this->request->post('variables'))->toArray();
      }

      return $result;
    }
}
