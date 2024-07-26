<?php

// namespace App\Model\Product;

class One extends AbstractProduct
{
    private $id;
    public function __construct($id)
    {
        parent::__construct();
        $this->id = $id;
    }

    public function get()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";

        return $this->conn->query($query, ["id" => $this->id])->fetch();
    }
}
