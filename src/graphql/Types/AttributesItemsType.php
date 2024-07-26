<?php

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;

class AttributeItemsTypes extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'AttributeItems',
            'fields' => [
                'id' => Type::int(),
                'attribute_id' => Type::int(),
                'display_value' => Type::string(),
                'value' => Type::string(),
            ]
        ]);
    }
}
