<?php

namespace Exhum4n\Http\Routes\Factory;

use Exhum4n\Http\Routes\Route;
use Exhum4n\Interfaces\Http\Routes\Factory\RouteFactoryInterface;
use Exhum4n\Interfaces\Http\Routes\RouteInterface;

class RouteFactory extends Route implements RouteFactoryInterface
{
    protected RouteInterface $route;

    public function __construct(string $method, string $controller, string $action)
    {
        $this->route = new Route();

        $this->route->method = $method;
        $this->route->controller = $controller;
        $this->route->action = $action;
    }

    public function create(): RouteInterface
    {
        return $this->route;
    }
}
