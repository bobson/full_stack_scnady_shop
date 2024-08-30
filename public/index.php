<?php

// ob_start();

require "../functions.php";
require "../src/Database/Databse.php";
require_once '../vendor/autoload.php';




use App\GraphQL\Resolvers\ProductResolver;
use App\GraphQL\Resolvers\AttributeResolver;
use App\GraphQL\Resolvers\CategoryResolver;
use App\GraphQL\Resolvers\OrderResolver;
use App\Model\Category;

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
        // echo "404 not found";
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        // dd($allowedMethods);
        echo "405 method not allowed";
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        // var_dump($_POST) . "<br>";
        echo $handler($vars);

        break;
}

// $db = new Database();
// $products = new ProductResolver();
// $products = $products->getProductsByCategory("all");
// $categories = new CategoryResolver();
// $products = $products->getProduct("apple-imac-2021");
// $attribute = new AttributeResolver();
// $categories = $categories->getAll();
// $attributes = $attribute->getAttribute("apple-imac-2021");

// $order = new OrderResolver();
// $order = $order->createOrder("apple-imac-2021", 2000, "color: silver", 1);

// dd($dispatcher);
// dd($products);
// dd($order);

// dd($categories);
