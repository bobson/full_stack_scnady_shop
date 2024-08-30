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
            'host' => 'scandi_backend-db-1',
            "dbname" => "scandi_shop",
        ];
        $dsn = "mysql:" . http_build_query($config, '', ';');
        try {

            $this->conn = new PDO($dsn, 'root', 'root', [
                // Dont force the result to be strings
                PDO::ATTR_STRINGIFY_FETCHES => false,
                // Dont emulate prepared statements
                PDO::ATTR_EMULATE_PREPARES => false,
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

    public function fetchColumn()
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

    public function lastInsertId()
    {
        return $this->conn->lastInsertId();
    }

    // Begin a transaction
    public function beginTransaction()
    {
        $this->conn->beginTransaction();
    }

    // Commit the transaction
    public function commit()
    {
        $this->conn->commit();
    }

    // Roll back the transaction
    public function rollBack()
    {
        $this->conn->rollBack();
    }
}
