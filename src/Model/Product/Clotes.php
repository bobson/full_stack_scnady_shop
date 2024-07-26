<?php

// namespace App\Model\Product;
// require "Product.php";

class Clotes extends AbstractProduct
{
    public function get()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE category = 'clothes'";
        return $this->conn->query($query)->fetchAll();
    }
}
