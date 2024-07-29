<?php

namespace App\Model\Product;

class Tech extends AbstractProduct
{

    public function __construct()
    {
        parent::__construct();
        $query = "SELECT * FROM " . $this->table . " WHERE category = 'tech'";
        $this->products = $this->conn->query($query)->fetchAll();
    }
    public function get()
    {
        return $this->getProductDetails();
    }
}
