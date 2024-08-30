<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type;

class OrderItemType extends InputObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'OrderItemInput',
            'fields' => [
                'product_id' => Type::nonNull(Type::string()),
                'product_price' => Type::nonNull(Type::float()),
                'selected_attributes' => Type::string(),
                'quantity' => Type::nonNull(Type::int())
            ]
        ]);
    }
}
