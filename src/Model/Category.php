<?php

namespace App\Model;

use App\Model\BaseModel;

class Category extends BaseModel
{
    protected $table = 'categories';
    protected $conn;

    public function get()
    {
        $query = "SELECT * FROM " . $this->table;

        return $this->conn->query($query)->fetchAll();
    }
}
