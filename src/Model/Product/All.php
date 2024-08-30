<?php

namespace App\Model\Product;

class All extends AbstractProduct
{
    protected function getCategory()
    {
        return "";
    }

    public function fetchAllProducts()
    {
        $data = $this->fetchProductData();
        return $this->processProducts($data);
    }
}
