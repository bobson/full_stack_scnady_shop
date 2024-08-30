<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;

class GalleryType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Gallery',
            'fields' => [
                'id' => Type::int(),
                'product_id' => Type::nonNull(Type::string()),
                'url' => Type::string(),
                // 'urls' => Type::listOf(Type::string())
            ]
        ]);
    }
}
