<?php

namespace App\GraphQL\Types;

use App\GraphQL\Resolvers\OrderResolver;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;
use App\GraphQL\Types\OrderItemType;

class MutationType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Mutation',
            'fields' => [
                'createOrder' => [
                    'type' => Type::string(),
                    'args' => [
                        'total_price' => Type::nonNull(Type::float()),
                        'total_items' => Type::nonNull(Type::int()),
                        'items_data' => Type::listOf(new OrderItemType())
                    ],
                    'resolve' => function ($root, $args) {
                        return (new OrderResolver)->createOrder(
                            $args['total_price'],
                            $args['total_items'],
                            $args['items_data']
                        );
                    }
                ],
            ]
        ]);
    }
}
