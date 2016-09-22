<?php

namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Container;


class Welcome
{
    private $container = null;

    /**
     * @param Container $container
     */
    public function __construct($container)
    {
        $this->container = $container;
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

        $response = $this->View($response, 'home.phtml', ["tickets" => 1, "router" => 1]);
        $response->getBody()->write("Hello, $name");

        return $response;
    }

    /**
     * @param Response  $response
     * @param string    $tmpl
     * @param mixed[]   $params
     * @return mixed
     */
    private function View(Response $response, $tmpl, $params)
    {
        return $this->container['view']->render($response, $tmpl, $params);
    }
}
