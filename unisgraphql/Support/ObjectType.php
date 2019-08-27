<?php
namespace unis\graphql\Support;

use \GraphQL\Type\Definition\ResolveInfo;
use \GraphQL\Type\Definition\ObjectType as GraphQLObjectType;

class ObjectType extends GraphQLObjectType
{
    public $typeConfig;
    public function __construct($args)
    {
        $this->typeConfig = $args;
        // 获取属性
        $attrs = $this->getAttrs($args);
        $self = $this;
        $config = [
            'name' => $attrs['name'],
            'description' => $attrs['description'],
            'fields' => function () use ($self, $args) {
                // 判断是否从args传入
                if (array_key_exists('fields', $args)) {
                    $fields = array_merge($self->fields(), $args['fields']);
                } else {
                    $fields = $self->fields();
                }
                return $fields;
            },
            'resolveField' => function($val, $args, $context, ResolveInfo $info) {
                // 如果定义了resolveField则使用它
                if (method_exists($this, 'resolveField')) {
                    return $this->resolveField($val, $args, $context, $info);
                }
                // 处理fieldsMap
                $fieldName = $info->fieldName;
                $fieldsMap = $this->fieldsMap();
                if (array_key_exists($fieldName, $fieldsMap)) {
                    $fieldName = $fieldsMap[$fieldName];
                }
                // 替换fieldName中的_下划线
                $methodName = "resolve" . str_replace('_', '', $fieldName);
                if (method_exists($this, $methodName)) {
                    return $this->{$methodName}($val, $args, $context, $info);
                } else {
                    return array_key_exists($fieldName, $val) ? $val[$fieldName] : null;
                }
            }
        ];
        parent::__construct($config);
    }
    public function attrs()
    {
        return [
            'name' => '',
            'description' => ''
        ];
    }
    public function getAttrs($args)
    {
        $default = [
            'name' => '',
            'description' => ''
        ];
        return array_merge($default, $this->attrs(), $args);
    }
    public function fields()
    {
        return [];
    }
    public function fieldsMap()
    {
        return [];
    }
}