<?php

namespace App\Model\Product;

class Tech extends AbstractProduct
{
    protected function getCategory()
    {
        return 'tech';
    }

    public function fetchAllProducts()
    {
        $data = $this->fetchProductData();
        return $this->processProducts($data);
    }
}
