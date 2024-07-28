<?php

namespace App\Model\Product;
// require "Product.php";

class Clothes extends AbstractProduct
{

    public function __construct()
    {
        parent::__construct();
        $query = "SELECT * FROM " . $this->table . " WHERE category = 'clothes'";
        $this->products =  $this->conn->query($query)->fetchAll();
    }
    public function get()
    {
        return $this->getProductDetails();
    }
}
