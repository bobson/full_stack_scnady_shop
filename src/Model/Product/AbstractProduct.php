<?php

namespace App\Model\Product;

use App\Model\BaseModel;
use App\Model\Attribute\Attribute;
use App\Model\Price\Price;
use App\Model\Gallery\Gallery;

abstract class AbstractProduct extends BaseModel
{
    protected $table = 'products';
    // Setting the products property to protected so that 
    // it can be accessed by the child classes
    protected $products;

    public function getProductDetails($product)
    {
        $attributes = new Attribute($product['id']);
        $attributes = $attributes->get();
        $product['attributes'] = $attributes ? $attributes : [];
        $prices = new Price($product['id']);
        $prices = $prices->get();
        $product['prices'] = $prices;
        $gallery = new Gallery($product['id']);
        $gallery = $gallery->get();
        $product['gallery'] = $gallery;

        return $product;
    }
};
