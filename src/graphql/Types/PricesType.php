<?php

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;

class PricesType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Attribute',
            'fields' => [
                'id' => Type::int(),
                'product_id' => Type::string(),
                'amount' => Type::int(),
                'currency_label' => Type::string(),
                'currency_symbol' => Type::string(),
            ]
        ]);
    }
}
