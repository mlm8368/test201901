<?php
namespace unis\graphql;

use unis\graphql\Support\Types;
use unis\graphql\Support\ObjectType;

class User extends ObjectType
{
  public function attrs()
  {
      return [
          'name' => 'ArchiveType',
          'description' => '档案类型2'
      ];
  }

  public function fields()
  {
      return [
          'id' => Types::id(),
          'nickname' => Types::string(),
          'created_time' => Types::string()
      ];
  }

  public function resolveCreatedTime($val)
  {
      return strtotime($val['created_time']);
  }
}