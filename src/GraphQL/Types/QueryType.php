<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;

// use App\GraphQL\Types\ProductsType;
use App\GraphQL\Resolvers\CategoryResolver;
use App\GraphQL\Resolvers\ProductResolver;
use App\GraphQL\Resolvers\ProductsResolver;


class QueryType extends ObjectType
{
    private $productType;
    public function __construct()
    {
        $this->productType = new ProductType();
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
                    'type' => Type::listOf($this->productType),
                    'args' => [
                        'category' => Type::nonNull(Type::string()),
                    ],
                    'resolve' => function ($_root, $args) {
                        return (new ProductResolver)->getProductsByCategory($args['category']);
                    }
                ],
                'product' => [
                    'type' => $this->productType,
                    'args' => [
                        'id' =>  Type::string(),
                    ],
                    'resolve' => function ($root, $args) {
                        return (new ProductResolver)->getProductById($args['id']);
                    }
                ]
            ]
        ]);
    }
}
