<?php

// namespace App\Model\Product;

class All extends AbstractProduct
{
    public function get()
    {
        $query = "SELECT * FROM " . $this->table;;
        return $this->conn->query($query)->fetchAll();
    }
}
