<?php

namespace App\Model\Attribute;

class Attribute extends AbstractAttribute
{

    public function __construct($product_id)
    {
        parent::__construct();
        $query = "SELECT * FROM " . $this->table . " WHERE product_id = :product_id";
        $this->attributes =
            $this->conn->query($query, ["product_id" => $product_id])
            ->fetchAll();
    }
}
