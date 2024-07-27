<?php

namespace App\Model\Product;

use App\Model\BaseModel;


abstract class AbstractProduct extends BaseModel
{
    protected $table = 'products';
    protected $product;
    protected function productDetails(product_id)
    {

        return $this->product;
    }



}
