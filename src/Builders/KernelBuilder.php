<?php

namespace Extale\Http\Builders;

use Extale\Http\Builders\Contracts\KernelBuilderContract;
use Extale\Http\Contracts\KernelContract;
use Extale\Http\Kernel;
use Extale\Http\Requests\Builders\RequestReceiverBuilder;
use Extale\Http\Requests\Contracts\RequestReceiverContract;
use Extale\Http\Routes\Builders\RouteReceiverBuilder;
use Extale\Http\Routes\Contracts\RouteReceiverContract;

class KernelBuilder extends Kernel implements KernelBuilderContract
{
    protected Kernel $kernel;

    public function __construct(string $basePath, array $options = [])
    {
        $this->kernel = new Kernel();

        $this->kernel->basePath = $basePath;
        $this->kernel->options = (object) $options;

        return $this;
    }

    public function produce(): KernelContract
    {
        $this->kernel->requestReceiver = $this->getRequestReceiver($this->kernel->basePath);
        $this->kernel->routeReceiver = $this->getRouteReceiver($this->kernel->options->routes_path);

        return $this->kernel;
    }

    protected function getRouteReceiver(string $routesPath): RouteReceiverContract
    {
        return (new RouteReceiverBuilder($routesPath))->produce();
    }

    protected function getRequestReceiver(string $basePath): RequestReceiverContract
    {
        return (new RequestReceiverBuilder($basePath))->produce();
    }
}
