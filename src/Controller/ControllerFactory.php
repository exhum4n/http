<?php

namespace Exhum4n\Http\Controller;

use Exhum4n\Interfaces\Http\Controller\ControllerFactoryInterface;
use Exhum4n\Interfaces\Http\Controller\ControllerInterface;
use Exhum4n\Interfaces\Http\Routes\RouteInterface;

class ControllerFactory extends Controller implements ControllerFactoryInterface
{
    /**
     * Create controller from current route
     *
     * @param RouteInterface $route
     * @return ControllerInterface
     */
    public function create(RouteInterface $route): ControllerInterface
    {
        $controller = $route->getController();

        $controller = new $controller();

        $controller->currentAction = $route->getAction();

        return $controller;
    }
}
