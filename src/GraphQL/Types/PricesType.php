<?php

namespace App\GraphQL\Types;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;

class PricesType extends ObjectType
{
    public function __construct()
    {
        parent::__construct([
            'name' => 'Prices',
            'fields' => [
                'id' => Type::int(),
                'product_id' => Type::nonNull(Type::string()),
                'amount' => Type::float(),
                'currency_label' => Type::string(),
                'currency_symbol' => Type::string(),
            ]
        ]);
    }
}
