<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;

use App\GraphQL\Resolvers\GalleryResolver;
use App\GraphQL\Resolvers\PriceResolver;
use App\GraphQL\Resolvers\AttributeResolver;

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
                'galery' => [
                    'type' => Type::listOf(new GalleryType()),
                    'resolve' => function ($product_id) {
                        return (new GalleryResolver())->getGallery($product_id);
                    }
                ],
                'description' => Type::string(),
                'category' => Type::string(),
                'prices' => [
                    'type' => Type::listOf(new PricesType()),
                    'resolve' => function ($product_id) {
                        return (new PriceResolver())->getPrice($product_id);
                    }
                ],
                'brand' => Type::string(),
                'gallery' => Type::string(),
                'attributes' => [
                    'type' => Type::listOf(new AttributeType()),
                    'resolve' => function ($product_id) {
                        return (new AttributeResolver())->getByProduct($product_id);
                    }
                ]
            ],
        ]);
    }
}
