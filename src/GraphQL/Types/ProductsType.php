<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;


class ProductsType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Products',
            'fields' => [
                'id' => Type::string(),
                'name' => Type::string(),
                'inStock' => Type::boolean(),
                'gallery' => new GalleryType(),
                'description' => Type::string(),
                'category' => Type::string(),
                'prices' =>  new PricesType(),
                'brand' => Type::string(),
                'attributes' => Type::listOf(new AttributeType()),
            ],
        ]);
    }
}
