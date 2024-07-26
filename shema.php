<?php

require "../vendor/autoload.php";

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Schema;

// Attribute type definition
$attributeType = new ObjectType([
    'name' => 'Attribute',
    'fields' => [
        'id' => Type::id(),
        "productId" => Type::int(),
        'name' => Type::string(),
        'value' => Type::string(),
    ]
]);

// Product type definition
$productType = new ObjectType([
    'name' => 'Product',
    'fields' => [
        'id' => Type::id(),
        "categoryId" => Type::int(),
        'name' => Type::string(),
        'price' => Type::float(),
        'created' => Type::string(),
        'attributes' => [
            'type' => Type::listOf($attributeType),
        ],
        'resolve' => function ($product) {
            return $product->getAttributes();
        }

    ]
]);
