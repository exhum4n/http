<?php

namespace Extale\Http\Routes\Builders;

use Extale\Http\Routes\Builders\Contracts\RouteBuilderContract;
use Extale\Http\Routes\Route;

class RouteBuilder extends Route implements RouteBuilderContract
{
    protected Route $route;

    public function __construct(string $method, string $controller, string $action)
    {
        $this->route = new Route();

        $this->route->method = $method;
        $this->route->controller = $controller;
        $this->route->action = $action;
    }

    public function produce(): Route
    {
        return $this->route;
    }
}
