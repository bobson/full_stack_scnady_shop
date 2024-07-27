<?php

namespace App\GraphQL\Resolvers;

use App\Model\Product\All;
use App\Model\Product\One;
use App\Model\Product\Clotes;
use App\Model\Product\Tech;

class ProductResolver
{
    public function getAll($category)
    {
        $class = ucfirst($category);
        $products = new $class();
        return $products->get();
    }

    public function getOne($id)
    {
        $product = new One($id);
        return $product->get();
    }
}
