<?php

namespace App\Model\Product;

class Product extends AbstractProduct
{
    private $product;
    public function __construct($id)
    {
        parent::__construct();
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $this->product =  $this->conn->query($query, ["id" => $id])->fetch();
    }

    public function get()
    {
        return $this->getProductDetails($this->product);
    }
}
