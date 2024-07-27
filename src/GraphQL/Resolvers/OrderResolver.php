<?php

namespace App\GraphQL\Resolvers;

use App\Model\Order;

class OrderResolver
{
    public function createOrder($args)
    {
        $order = new Order();
        // return $order->create($args['product_id'], $args['quantity'], $args['total_price']);
    }
}
