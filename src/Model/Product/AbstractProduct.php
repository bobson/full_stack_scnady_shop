<?php

// namespace App\Model\Product;

// require "../../Database/Databse.php";

abstract class AbstractProduct
{
    protected $table = 'products';
    protected $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db;
    }

    abstract public function get();
}
