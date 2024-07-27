<?php

namespace App\Model\Product;

class All extends AbstractProduct
{
    private $products;
    public function __construct()
    {
        parent::__construct();
        $query = "SELECT * FROM " . $this->table;;
        $products =  $this->conn->query($query)->fetchAll();
        $this->products = $products;
    }
}
