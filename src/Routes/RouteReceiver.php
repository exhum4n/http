<?php

namespace Exhum4n\Http\Routes;

use Exhum4n\Interfaces\Http\Requests\RequestInterface;
use Exhum4n\Http\Routes\Exceptions\RouteNotFoundException;
use Exhum4n\Http\Routes\Factory\RouteFactory;
use Exhum4n\Interfaces\Http\Routes\RouteInterface;
use Exhum4n\Interfaces\Http\Routes\RouteReceiverInterface;

class RouteReceiver implements RouteReceiverInterface
{
    /**
     * Current request
     *
     * @var RequestInterface $request
     */
    protected RequestInterface $request;

    /**
     * List of user created routes
     *
     * @var array $routes
     */
    protected array $routes;

    /**
     * Get requested route
     *
     * @return Route
     *
     * @throws RouteNotFoundException
     */
    public function getRoute(): RouteInterface
    {
        $requestPath = $this->request->getRequestPath();
        $requestMethod = $this->request->getMethod();

        $params = $this->routes[$requestPath][$requestMethod];
        if (empty($params)) {
            throw new RouteNotFoundException($requestPath);
        }

        return (new RouteFactory(...$this->routes[$requestPath][$requestMethod]))->create();
    }
}
