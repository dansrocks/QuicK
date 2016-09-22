<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


class Welcome
{
    public function index(Request $request, Response $response)
    {
            return $response->getBody()->write("Hola " . __CLASS__);
    }

    public function hello(Request $request, Response $response)
    {
        $name = $request->getAttribute('name', null);
        if (! $name) {
            $name = 'unknown';
        }
        $response->getBody()->write("Hello, $name");

        return $response;
    }
}
