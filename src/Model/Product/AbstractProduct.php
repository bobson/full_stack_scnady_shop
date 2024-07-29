<?php

namespace App\Model\Product;

use App\Model\BaseModel;
use App\Model\Attribute\Attribute;
use App\Model\Price\Price;
use App\Model\Gallery\Gallery;

abstract class AbstractProduct extends BaseModel
{
    protected $table = 'products';
    protected $products;
    protected $finalProduct;

    public function getProductDetails()
    {
        foreach ($this->products as $product) {
            $attributes = new Attribute($product['id']);
            $attributes = $attributes->get();

            $prices = new Price($product['id']);
            $prices = $prices->get();
            $gallery = new Gallery($product['id']);
            $gallery = $gallery->get();
            $product['attributes'] = $attributes ? $attributes : [];
            $product['prices'] = $prices;
            $product['gallery'] = $gallery;
            // dd($product['attributes']);
            $this->finalProduct[] = $product;
        }
        dd("here");
        dd($this->finalProduct);
        return $this->finalProduct;
    }
};
