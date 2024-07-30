<?php

namespace App\Model\Product;
// require "Product.php";

class Clothes extends AbstractProduct
{
    private $clothesProducts;
    public function __construct()
    {
        parent::__construct();
        $query = "SELECT * FROM " . $this->table . " WHERE category = 'clothes'";
        // Fetch clothes products and store them in the parent class property
        $this->products =  $this->conn->query($query)->fetchAll();
    }

    public function get()
    {
        foreach ($this->products as $product) {
            $this->clothesProducts[] = $this->getProductDetails($product);
        }
        return $this->clothesProducts;
    }
}
