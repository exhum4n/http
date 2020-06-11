<?php

/**
 * @noinspection
 *
 * PhpIncludeInspection
 * PhpUnhandledExceptionInspection
 */

namespace Hooina\Http\Routes;

use Hooina\Http\Requests\Interfaces\RequestInterface;
use Hooina\Http\Routes\Factory\RouteFactory;
use Hooina\Http\Routes\Exceptions\RouteNotFoundException;

class RouteReceiver
{
    protected ?string $routesPath;

    protected ?array $routes;

    protected string $basePath;

    public function getRoute(RequestInterface $request): Route
    {
        $requestPath = $request->getRequestPath();

        $params = $this->routes[$requestPath][$request->getMethod()];

        if (empty($params)) {
            throw new RouteNotFoundException($requestPath);
        }

        return (new RouteFactory(...$this->routes[$requestPath][$request->getMethod()]))->create();
    }
}
