<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;

use App\GraphQL\Resolvers\OrderResolver;

class MutationType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Mutation',
            'fields' => [
                'createOrder' => [
                    'type' => new OrderType(),
                    'args' => [
                        'product_id' => Type::nonNull(Type::int()),
                        'quantity' => Type::nonNull(Type::int()),
                        'total_price' => Type::nonNull(Type::float())
                    ],
                    'resolve' => function ($root, $args) {
                        return (new OrderResolver())->createOrder($args);
                    }
                ]
            ]
        ]);
    }
}
