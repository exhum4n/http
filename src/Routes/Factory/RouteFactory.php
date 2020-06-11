<?php

namespace Hooina\Http\Routes\Factory;

use Hooina\Http\Routes\Route;

class RouteFactory extends Route
{
    protected Route $route;

    public function __construct(string $method, string $controller, string $action)
    {
        $this->route = new Route();

        $this->route->method = $method;
        $this->route->controller = $controller;
        $this->route->action = $action;
    }

    public function create(): Route
    {
        return $this->route;
    }
}
