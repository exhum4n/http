<?php

namespace Extale\Http;

use Extale\Http\Requests\Contracts\RequestReceiverContract;
use Extale\Http\Contracts\KernelContract;
use Extale\Http\Responses\Contracts\ResponseContract;
use Extale\Http\Routes\Contracts\RouteReceiverContract;

class Kernel implements KernelContract
{
    protected RequestReceiverContract $requestReceiver;

    protected RouteReceiverContract $routeReceiver;

    protected string $basePath;

    protected string $controller;

    protected array $arguments;

    protected object $options;

    public function handle(): ResponseContract
    {
        $request = $this->requestReceiver->getRequest();

        $route = $this->routeReceiver->getRoute($request);

        return $route->run($request);
    }
}
