<?php

namespace App\Model\Order;

use App\Model\BaseModel;

class Order extends BaseModel
{
    protected $table = 'orders';
    protected $itemsTable = 'order_items';

    public function __construct()
    {
        parent::__construct();
        $this->createTables();
    }

    private function createTables()
    {
        $sqlOrders = "
        CREATE TABLE IF NOT EXISTS {$this->table} (
            id INT AUTO_INCREMENT PRIMARY KEY,
            total_price DECIMAL(10, 2) NOT NULL,
            total_items INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;
    ";
        $this->conn->query($sqlOrders);

        // Create order_items table if it does not exist
        $sqlItems = "
         CREATE TABLE IF NOT EXISTS {$this->itemsTable} (
             id INT AUTO_INCREMENT PRIMARY KEY,
             order_id INT NOT NULL,
             product_id VARCHAR(255) NOT NULL,
             product_price DECIMAL(10, 2) NOT NULL,
             selected_attributes TEXT,
             quantity INT NOT NULL,
             FOREIGN KEY (order_id) REFERENCES {$this->table}(id)
         ) ENGINE=INNODB;
     ";
        $this->conn->query($sqlItems);
    }



    public function insertOrder($totalPrice, $totalItems, $itemsData)
    {
        $sql = "INSERT INTO {$this->table} (total_price, total_items)
                VALUES (:total_price, :total_items)";

        $this->conn->query($sql, [
            ':total_price' => $totalPrice,
            ':total_items' => $totalItems
        ]);

        $orderId = $this->conn->lastInsertId();

        // Insert items into order_items table
        $sqlItems = "INSERT INTO {$this->itemsTable} (order_id, product_id, product_price, selected_attributes, quantity)
                     VALUES (:order_id, :product_id, :product_price, :selected_attributes, :quantity)";


        foreach ($itemsData as $item) {
            $this->conn->query($sqlItems, [
                ':order_id' => $orderId,
                ':product_id' => $item['product_id'],
                ':product_price' => $item['product_price'],
                ':selected_attributes' => $item['selected_attributes'],
                ':quantity' => $item['quantity']
            ]);
        }
        return $orderId;
    }


    public function getOrderById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $this->conn->query($sql, [':id' => $id]);
        return $this->conn->fetch();
    }

    public function getAllOrders()
    {
        $sql = "SELECT * FROM {$this->table}";
        $this->conn->query($sql);
        return $this->conn->fetchAll();
    }
}
