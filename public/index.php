<?php



require "../functions.php";
require "../src/Database/Databse.php";
require_once '../vendor/autoload.php';
// require_once "vendor/autoload.php";
// require '../src/Model/Product/AbstractProduct.php';
// require '../src/Model/Attribute/AbstractAttribute.php';
// use App\Database\Database;
// use App\Controller\GraphQL;

// require '../src/Model/Product/Clotes.php';
// require '../src/Model/Product/All.php';
// require '../src/Model/Product/Tech.php';
// require '../src/Model/Product/One.php';
// require '../src/Model/Attribute/ByProduct.php';
// require '../src/Model/Attribute/Items.php';
// require '../src/graphql/Resolvers/ProductResolver.php';
// require '../src/graphql/Resolvers/AttributeResolver.php';

use App\GraphQL\Resolvers\ProductResolver;
use App\GraphQL\Resolvers\AttributeResolver;
use App\GraphQL\Resolvers\CategoryResolver;
use App\Model\Category;

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $r) {
    $r->post('/graphql', [App\Controller\GraphQL::class, 'handle']);
});

$routeInfo = $dispatcher->dispatch(
    $_SERVER['REQUEST_METHOD'],
    $_SERVER['REQUEST_URI']
);
// dd($_SERVER['REQUEST_URI']);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        echo "404 not found";
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
        echo $handler($vars);
        echo "route found";
        break;
}

// $db = new Database();
$products = new ProductResolver();
// $products = $products->getAll("tech");
// $categories = new CategoryResolver();
$products = $products->getProduct("apple-imac-2021");
// $attribute = new AttributeResolver();
// $attributes = $attribute->getAttribute("apple-imac-2021");
// dd($dispatcher);

// dd($products);
