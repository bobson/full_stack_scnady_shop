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
                    'resolve' => function () {
                        return (new CategoryResolver())->getAll();
                    }
                ],
                'products' => [
                    'type' => Type::listOf(new ProductType()),
                    'resolve' => function ($category) {
                        return (new ProductResolver())->getAll($category);
                    }
                ],
                'product' => [
                    'type' => Type::listOf(new ProductType()),
                    'resolve' => function ($id) {
                        return (new ProductResolver())->getOne($id);
                    }
                ]
            ]
        ]);
    }
}
