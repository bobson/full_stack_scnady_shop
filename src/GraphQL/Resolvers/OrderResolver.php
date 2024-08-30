<?php

namespace App\GraphQL\Resolvers;

use App\Model\Order\Order;

class OrderResolver
{

    public function getAllOrders()
    {
        $order = new Order();
        return $order->getAllOrders();
    }


    public function getOrderById($id)
    {
        $order = new Order();
        return $order->getOrderById($id);
    }


    public function createOrder($totalPrice, $totalItems, $itemsData)
    {
        $order = new Order();
        $order_id = $order->insertOrder($totalPrice, $totalItems, $itemsData);

        return $order_id;
    }
}
