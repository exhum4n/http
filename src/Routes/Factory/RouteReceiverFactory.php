<?php

namespace Exhum4n\Http\Routes\Factory;

use Exhum4n\Interfaces\Http\Requests\RequestInterface;
use Exhum4n\Interfaces\Http\Routes\Factory\RouteReceiverFactoryInterface;
use Exhum4n\Interfaces\Http\Routes\RouteReceiverInterface;
use Exhum4n\Http\Routes\RouteReceiver;

class RouteReceiverFactory extends RouteReceiver implements RouteReceiverFactoryInterface
{
    /**
     * Crate and initialize an route receiver
     *
     * @param RequestInterface $request
     * @param array $routes
     *
     * @return RouteReceiverInterface
     */
    public function create(RequestInterface $request, array $routes): RouteReceiverInterface
    {
        $routeReceiver = new RouteReceiver();

        $routeReceiver->request = $request;
        $routeReceiver->routes = $routes;

        return $routeReceiver;
    }
}
