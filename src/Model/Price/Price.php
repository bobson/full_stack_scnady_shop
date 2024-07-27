<?php

namespace App\Model\Price;

class Price extends AbstractPrice
{
    private $product_id;
    public function __construct($product_id)
    {
        parent::__construct();
        $this->product_id = $product_id;
    }
    public function get()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE product_id = :product_id";
        return $this->conn->query($query, ["product_id" => $this->product_id])->fetch();
    }
}
