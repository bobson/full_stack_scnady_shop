<?php

namespace App\Model\Product;

class Tech extends AbstractProduct
{
    private $techProducts;
    public function __construct()
    {
        parent::__construct();
        $query = "SELECT * FROM " . $this->table . " WHERE category = 'tech'";
        // Fetch tech products and store them in the parent class property
        $this->products =  $this->conn->query($query)->fetchAll();
    }

    public function get()
    {
        foreach ($this->products as $product) {
            $this->techProducts[] = $this->getProductDetails($product);
        }
        return $this->techProducts;
    }
}
