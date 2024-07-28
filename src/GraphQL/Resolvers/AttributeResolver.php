<?php

namespace App\GraphQL\Resolvers;

use App\Model\Attribute\Attribute;
use App\Model\Attribute\Items;

class AttributeResolver
{
    public function getAttribute($productId)
    {
        $attribute = new Attribute($productId);
        return $attribute->get();
    }
    public function getItems($attributeId)
    {
        $attribute = new Items($attributeId);
        return $attribute->get();
    }
}
