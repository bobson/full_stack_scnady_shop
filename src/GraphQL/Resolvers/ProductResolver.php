<?php

namespace App\GraphQL\Resolvers;

use App\Model\Product\Product;

class ProductResolver
{
    public function getProductsByCategory($category)
    {
        // Require the model dinamicly based on the category
        $class = 'App\Model\Product\\' . ucfirst($category);
        $products = new $class();
        return $products->fetchAllProducts();
    }

    public function getProductById($id)
    {
        $product = new Product();
        return $product->fetchProductById($id);
    }
}
