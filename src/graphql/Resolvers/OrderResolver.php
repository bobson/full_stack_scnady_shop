
<?php

require_once '../../src/Order.php';

class OrderResolver
{
    public function createOrder($args)
    {
        $order = new Order();
        return $order->create($args['product_id'], $args['quantity'], $args['total_price']);
    }
}
