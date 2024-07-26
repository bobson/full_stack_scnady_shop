<?php

require  __DIR__ . "/../functions.php";
require __DIR__ . "/../src/Database/Databse.php";
require __DIR__ . '/../vendor/autoload.php';
require '../src/Model/Product/AbstractProduct.php';
require '../src/Model/Attribute/AbstractAttribute.php';


require '../src/Model/Product/Clotes.php';
require '../src/Model/Product/All.php';
require '../src/Model/Product/Tech.php';
require '../src/Model/Product/One.php';
require '../src/Model/Attribute/ByProduct.php';
require '../src/Model/Attribute/Items.php';
require '../src/graphql/Resolvers/ProductResolver.php';
require '../src/graphql/Resolvers/AttributeResolver.php';



$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->post('/graphql', [App\Controller\GraphQL::class, 'handle']);
});

$routeInfo = $dispatcher->dispatch(
    $_SERVER['REQUEST_METHOD'],
    $_SERVER['REQUEST_URI']
);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        // echo "404 Not Found";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        echo $handler($vars);
        break;
}

// $db = new Database();
$products = new ProductResolver();
// $products = $products->getAll("clotes");
$products = $products->getOne("apple-imac-2021");
$attribute = new AttributeResolver();
$attributes = $attribute->getByProduct("apple-imac-2021");

dd($attributes);
