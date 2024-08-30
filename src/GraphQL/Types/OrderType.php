<?php

namespace App\GraphQL\Types;

use App\Model\Order;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;

class OrderType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Order',
            'fields' => function () {
                return [
                    'id' => Type::nonNull(Type::int()),
                    'order_id' => Type::nonNull(Type::string()),
                    'product_name' => Type::nonNull(Type::string()),
                    'product_price' => Type::nonNull(Type::float()),
                    'selected_attributes' => Type::string(),
                    'quantity' => Type::int(),
                    'created_at' => Type::string(),
                ];
            },
        ]);
    }
}
