<?php
namespace unis\graphql\collect;

use unis\graphql\Support\Types;
use unis\graphql\Support\ObjectType;

class ArchiveMutation extends ObjectType
{
  public function attrs()
  {
      return [
          'name' => 'UserType',
          'desc' => '用户类型'
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