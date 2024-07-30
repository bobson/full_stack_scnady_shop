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
    // Forsing the child classes to implement the get method
    abstract public function get();
}
