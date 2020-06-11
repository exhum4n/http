<?php

namespace Hooina\Http\Requests;

use Hooina\Http\Requests\Interfaces\RequestInterface;

class Request implements RequestInterface
{
    protected string $path;

    protected string $method;

    protected array $headers;

    protected array $parameters;

    public function all(): array
    {
        return $this->parameters;
    }

    public function get(string $key)
    {
        return $this->parameters[$key];
    }

    public function getRequestPath(): string
    {
        return $this->path;
    }

    public function getMethod(): string
    {
        return $this->method;
    }
}
