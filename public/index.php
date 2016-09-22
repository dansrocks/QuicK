<?php

require './vendor/autoload.php';


$app = new \Slim\App;
$app->get('/', '\App\Controllers\Welcome:index');
$app->get('/hello', '\App\Controllers\Welcome:hello');
$app->get('/hello/{name}', '\App\Controllers\Welcome:hello');

$app->run();