<?php

namespace App\GraphQL\Resolvers;

use App\Model\Attribute\ByProduct;
use App\Model\Attribute\Items;

class AttributeResolver
{
    public function getByProduct($productId)
    {
        $attribute = new ByProduct($productId);
        return $attribute->get();
    }
    public function getItems($attributeId)
    {
        $attribute = new Items($attributeId);
        return $attribute->get();
    }
}
