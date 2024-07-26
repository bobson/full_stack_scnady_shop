// src/Order.php
<?php

require_once 'Database.php';

class Order
{
    private $conn;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function create($productId, $quantity, $totalPrice)
    {
        $query = 'INSERT INTO orders (product_id, quantity, total_price) VALUES (:product_id, :quantity, :total_price)';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':product_id', $productId);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':total_price', $totalPrice);
        if ($stmt->execute()) {
            return [
                'id' => $this->conn->lastInsertId(),
                'product_id' => $productId,
                'quantity' => $quantity,
                'total_price' => $totalPrice,
                'order_date' => date('Y-m-d H:i:s')
            ];
        } else {
            throw new Exception("Error creating order");
        }
    }
}
