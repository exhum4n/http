<?php

namespace Hooina\Http;

use Hooina\Http\Requests\RequestReceiver;
use Hooina\Http\Responses\Response;
use Hooina\Http\Routes\RouteReceiver;
use Hooina\Http\Routes\Exceptions\RouteNotFoundException;

class Kernel
{
    protected RequestReceiver $requestReceiver;

    protected RouteReceiver $routeReceiver;

    protected string $basePath;

    protected array $options;

    /**
     * Get request data and create response object
     *
     * @return Response
     * @throws RouteNotFoundException
     */
    public function handle(): Response
    {
        $request = $this->requestReceiver->getRequest();

        $route = $this->routeReceiver->getRoute($request);

        return $route->run($request);
    }
}
