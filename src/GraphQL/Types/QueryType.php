<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;

use App\GraphQL\Resolvers\CategoryResolver;
use App\GraphQL\Resolvers\ProductResolver;


class QueryType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([

            'name' => 'Query',
            'fields' => [
                'categories' => [
                    'type' => Type::listOf(new CategoryType()),
                    'resolve' => function ($root, $args) {
                        return (new CategoryResolver())->getAll();
                    }
                ],
                'products' => [
                    'type' => Type::listOf(new ProductType()),
                    'args' => [
                        'category' => Type::string(),
                    ],
                    'resolve' => function ($root, $args) {
                        return (new ProductResolver())->getAll($args['category']);
                    }
                ],
                'product' => [
                    'type' => new ProductType(),
                    'args' => [
                        'id' => ['type' => Type::string()],
                    ],
                    'resolve' => function ($root, $args) {
                        return (new ProductResolver())->getProduct($args['id']);
                    }
                ]
            ]
        ]);
    }
}
