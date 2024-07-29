<?php

namespace App\Model\Product;

class All extends AbstractProduct
{

    public function __construct()
    {
        parent::__construct();
        $query = "SELECT * FROM " . $this->table;;
        $this->products =  $this->conn->query($query)->fetchAll();
    }
    public function get()

    {
        return $this->getProductDetails();
    }
}
