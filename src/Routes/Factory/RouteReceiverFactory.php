<?php

/** @noinspection PhpIncludeInspection */

namespace Hooina\Http\Routes\Factory;

use Hooina\Http\Routes\RouteReceiver;

class RouteReceiverFactory extends RouteReceiver
{
    protected function getRoutes(string $basePath, string $path = null): array
    {
        $list = [];

        if (is_null($path)) {
            return $list;
        }

        $routes = include_once "$basePath/$path";
        if (count($routes) === 0) {
            return $list;
        }

        foreach ($routes as $index => $route) {
            foreach ($route as $path => $params) {
                $list[$path][$params['method']] = array_values($params);
            }
        }

        return $list;
    }

    public function create(string $basePath, string $routesPath = null): RouteReceiver
    {
        $routeReceiver = new RouteReceiver();

        $routeReceiver->routesPath = $routesPath;
        $routeReceiver->basePath = $basePath;
        $routeReceiver->routes = $this->getRoutes($basePath, $routesPath);

        return $routeReceiver;
    }
}
