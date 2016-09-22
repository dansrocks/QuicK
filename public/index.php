<?php

require './vendor/autoload.php';


$container = new \Slim\Container();
$container['view'] = function ($container) {
    return new \Slim\Views\PhpRenderer('./templates/');
};


$app = new \Slim\App($container);

$app->get('/', '\App\Controllers\Welcome:index');
$app->get('/hello', '\App\Controllers\Welcome:hello');
$app->get('/hello/{name}', '\App\Controllers\Welcome:hello');

$app->run();