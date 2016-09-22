<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


class Welcome
{
    private $view = null;

    /**
     * @param \Slim\Views\PhpRenderer $view
     */
    public function __construct(\Slim\Views\PhpRenderer $view)
    {
        $this->view = $view;
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return int
     */
    public function index(Request $request, Response $response)
    {
        return $response->getBody()->write("Hola " . __CLASS__);
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function hello(Request $request, Response $response)
    {
        $name = $request->getAttribute('name', null);
        if (! $name) {
            $name = 'unknown';
        }

        $response = $this->view->render($response, 'home.phtml', ["tickets" => 1, "router" => 1]);
        $response->getBody()->write("Hello, $name");

        return $response;
    }
}
