<?php

namespace App\Database;

use PDO;
use PDOException;

class Database
{
    private $conn;
    private $stmt;

    public function __construct()
    {
        // $this->conn = null;
        $config = [
            'host' => '127.0.0.1', "dbname" => "shop"
        ];
        $dsn = "mysql:" . http_build_query($config, '', ';');
        try {

            $this->conn = new PDO($dsn, 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        // return $this->conn;
    }

    public function query($sql, $params = [])
    {

        $this->stmt = $this->conn->prepare($sql);
        $this->stmt->execute($params);
        return $this->stmt;
    }

    public function fetchAll()
    {
        return $this->stmt->fetchAll();
    }

    public function fetch()
    {
        return $this->stmt->fetch();
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
