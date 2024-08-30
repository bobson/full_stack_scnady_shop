<?php

use App\Model\BaseModel;

class OrderItem extends BaseModel
{
    protected $table = 'order_items';
    // private $conn;

    // public function __construct($conn)
    // {
    //     $this->conn = $conn;
    // }

    public function createOrderItem($orderId, $item)
    {
        $query = "INSERT INTO " . $this->table . " (order_id, product_name, price, selected_attributes, quantity) VALUES (?, ?, ?, ?, ?)";
        $this->conn->query($query, [
            $orderId,
            $item['product_id'],
            $item['price'],
            json_encode($item['selected_attributes']),
            $item['quantity']
        ]);
    }
}
