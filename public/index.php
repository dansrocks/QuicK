<?php

require './vendor/autoload.php';


$container = new \Slim\Container();
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('./templates/');
};
// Dependency Injection.. should be extends to main Controller Class
$container['\App\Controllers\Welcome'] = function ($container) {
    return new \App\Controllers\Welcome($container['view']) ;
};

$app = new \Slim\App($container);

$app->get('/', '\App\Controllers\Welcome:index');
$app->get('/hello', '\App\Controllers\Welcome:hello');
$app->get('/hello/{name}', '\App\Controllers\Welcome:hello');

$app->run();