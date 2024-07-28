<?php

namespace App\Model;

use App\Database\Database;

abstract class BaseModel
{

    protected $conn;
    protected $table;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db;
    }

    abstract public function get();
}
