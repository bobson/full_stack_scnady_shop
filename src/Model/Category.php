<?php
class Category
{
    protected $table = 'categories';
    protected $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table;

        return $this->conn->query($query)->fetchAll();
    }
}
