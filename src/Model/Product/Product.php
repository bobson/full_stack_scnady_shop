<?php

namespace App\Model\Product;

class Product extends AbstractProduct
{

    public function __construct($id)
    {
        parent::__construct();
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $this->products =  $this->conn->query($query, ["id" => $id])->fetchAll();
    }
    public function get()
    {
        // dd($this->getProductDetails());
        return $this->getProductDetails()[0];
    }
}
