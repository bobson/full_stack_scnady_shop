<?php

namespace App\Model\Product;

class Tech extends AbstractProduct
{
    public function get()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE category = 'tech'";
        return $this->conn->query($query)->fetchAll();
    }
}
