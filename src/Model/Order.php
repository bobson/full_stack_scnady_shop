<?php

namespace App\Model;

use App\Model\BaseModel;

class Order extends BaseModel
{
    protected $table = 'orders';

    public function get()
    {
        $query = "SELECT * FROM " . $this->table;

        return $this->conn->query($query)->fetchAll();
    }
}
