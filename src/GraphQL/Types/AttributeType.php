<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;

use App\GraphQL\Resolvers\AttributeResolver;

class AttributeType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Attribute',
            'fields' => [
                'id' => Type::int(),
                'product_id' => Type::string(),
                'name' => Type::string(),
                'type' => Type::string(),
                'items' => [
                    'type' => Type::listOf(new AttributeItemsTypes()),
                    'resolve' => function ($attribute_id) {
                        return (new AttributeResolver())->getItems($attribute_id);
                    }
                ]
            ]
        ]);
    }
}
