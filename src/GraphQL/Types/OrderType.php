<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;

class OrderType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Order',
            'fields' => [
                'id' => Type::int(),
                'product_id' => Type::int(),
                'quantity' => Type::int(),
                'total_price' => Type::float(),
                'order_date' => Type::string(),
            ]
        ]);
    }
}
