<?php

namespace App\Model\Price;

use App\Model\BaseModel;

class Price extends BaseModel
{
    protected $table = 'prices';
    private $price;
    public function __construct($product_id)
    {
        parent::__construct();
        $query = "SELECT * FROM " . $this->table . " WHERE product_id = :product_id";
        $this->price =  $this->conn->query($query, ["product_id" => $product_id])->fetch();
    }
    public function get()
    {
        return $this->price;
    }
}
