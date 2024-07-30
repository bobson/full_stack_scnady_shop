<?php

namespace App\Model\Product;

class All extends AbstractProduct
{
    private $allProducts;
    public function __construct()
    {
        parent::__construct();
        $query = "SELECT * FROM " . $this->table;
        // Fetch all products and store them in the parent class property
        $this->products =  $this->conn->query($query)->fetchAll();
    }

    public function get()
    {
        foreach ($this->products as $product) {
            $this->allProducts[] = $this->getProductDetails($product);
        }
        return $this->allProducts;
    }
}
