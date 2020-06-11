<?php

namespace Hooina\Http\Requests;

use Hooina\Http\Requests\Factory\RequestFactory;

class RequestReceiver
{
    protected array $headers;

    protected string $method;

    protected string $path;

    protected array $parameters;

    protected string $basePath;

    protected array $files;

    public function getRequest(): Request
    {
        return (new RequestFactory())->create($this->method, $this->path, $this->parameters, $this->headers);
    }
}
