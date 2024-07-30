<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;


class ProductType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Product',
            'fields' => [
                'id' => Type::string(),
                'name' => Type::string(),
                'in_stock' => Type::boolean(),
                'gallery' => Type::listOf(new GalleryType()),
                'description' => Type::string(),
                'category' => Type::string(),
                'prices' =>  new PricesType(),
                'brand' => Type::string(),
                'attributes' => Type::listOf(new AttributeType()),
            ],
        ]);
    }
}
