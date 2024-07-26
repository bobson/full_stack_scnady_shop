<?php

abstract class AbstractAttribute
{
    protected $table = 'attributes';
    protected $conn;
    protected $items = 'attributes_items';

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db;
    }

    abstract public function get();
}
