<?php

namespace Hooina\Http\Factory;

use Hooina\Http\Kernel;
use Hooina\Http\Requests\Factory\RequestReceiverFactory;
use Hooina\Http\Requests\RequestReceiver;
use Hooina\Http\Routes\Factory\RouteReceiverFactory;
use Hooina\Http\Routes\RouteReceiver;

class KernelFactory extends Kernel
{
    protected function getRouteReceiver(string $basePath, string $routesPath = null): RouteReceiver
    {
        return (new RouteReceiverFactory())->create($basePath, $routesPath);
    }

    protected function getRequestReceiver(string $basePath): RequestReceiver
    {
        return (new RequestReceiverFactory())->create($basePath);
    }

    public function create(string $basePath, array $options = []): Kernel
    {
        $kernel = new Kernel();

        $kernel->basePath = $basePath;
        $kernel->options = $options;
        $kernel->requestReceiver = $this->getRequestReceiver($basePath);
        $kernel->routeReceiver = $this->getRouteReceiver($basePath, $options['routes_path']);

        return $kernel;
    }
}
