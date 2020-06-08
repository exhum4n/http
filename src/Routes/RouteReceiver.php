<?php

/**
 * @noinspection
 *
 * PhpIncludeInspection
 * PhpUnhandledExceptionInspection
 */

namespace Extale\Http\Routes;

use Extale\Http\Routes\Builders\RouteBuilder;
use Extale\Http\Routes\Contracts\RouteReceiverContract;
use Extale\Http\Requests\Request;
use Extale\Http\Routes\Exceptions\RouteNotFoundException;

class RouteReceiver implements RouteReceiverContract
{
    protected string $routesPath;

    protected array $routes;

    public function getRoute(Request $request): Route
    {
        $requestPath = $request->getRequestPath();

        $params = $this->routes[$requestPath][$request->getMethod()];

        if (empty($params)) {
            throw new RouteNotFoundException($requestPath);
        }

        return (new RouteBuilder(...$this->routes[$requestPath][$request->getMethod()]))->produce();
    }

    protected function getRoutes(): array
    {
        $routes = include_once $this->routesPath;

        $list = [];

        foreach ($routes as $index => $route) {
            foreach ($route as $path => $params) {
                $list[$path][$params['method']] = array_values($params);
            }
        }

        return $list;
    }
}
