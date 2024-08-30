<?php

namespace App\Model\Product;

class Clothes extends AbstractProduct
{
    protected function getCategory()
    {
        return 'clothes';
    }

    public function fetchAllProducts()
    {
        $data = $this->fetchProductData();
        return $this->processProducts($data);
    }
}
