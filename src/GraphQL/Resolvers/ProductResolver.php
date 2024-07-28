<?php

namespace App\GraphQL\Resolvers;

use App\Model\Product\Product;

class ProductResolver
{
    public function getAll($category)
    {
        $class = 'App\Model\Product\\' . ucfirst($category);
        $products = new $class();
        return $products->get();
    }

    public function getProduct($id)
    {
        $product = new Product($id);
        return $product->get();
    }
}
