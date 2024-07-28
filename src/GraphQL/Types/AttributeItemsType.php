<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;

class AttributeItemsType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'AttributeItem',
            'fields' => [
                'id' => Type::int(),
                'attribute_id' => Type::int(),
                'display_value' => Type::string(),
                'value' => Type::string(),
            ]
        ]);
    }
}
