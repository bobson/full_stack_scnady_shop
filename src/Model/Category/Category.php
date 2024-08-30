<?php

namespace App\Model\Category;

use App\Model\BaseModel;

class Category extends BaseModel
{
    protected $table = 'categories';
    protected $conn;

    public function set()
    {
        $query = "SELECT * FROM " . $this->table;

        return $this->conn->query($query)->fetchAll();
    }
}
