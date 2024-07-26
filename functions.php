<?php

function dd()
{
    echo '<pre>';
    array_map(function ($x) {
        var_dump($x);
    }, func_get_args());
    die;
}

function getAll($args)
{
    $class = ucfirst($args);
    $products = new $class();
    return $products;
}
