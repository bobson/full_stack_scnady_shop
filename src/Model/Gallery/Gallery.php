<?php

namespace App\Model\Gallery;

use App\Model\BaseModel;

class Gallery extends BaseModel
{
    private $gallery;
    protected $table = 'galleries';
    public function __construct($product_id)
    {
        parent::__construct();
        $query = "SELECT * FROM " . $this->table . " WHERE product_id = :product_id";
        $this->gallery = $this->conn->query($query, ["product_id" => $product_id])->fetchAll();
    }
    public function get()
    {
        return $this->gallery;
    }
}
