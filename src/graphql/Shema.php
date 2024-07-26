<?php

require_once 'Types/CategoryType.php';
require_once 'Types/ProductType.php';
require_once 'Types/AttributeType.php';
require_once 'Types/OrderType.php';
require_once 'Types/MutationType.php';
require_once 'Types/QueryType.php';

use GraphQL\Type\Schema;

$schema = new Schema([
    'query' => QueryType::get(),
    'mutation' => MutationType::get()
]);
