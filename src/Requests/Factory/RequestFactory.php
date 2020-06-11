<?php

namespace Hooina\Http\Requests\Factory;

use Hooina\Http\Requests\Request;

class RequestFactory extends Request
{
    public function create(string $method, string $path, array $parameters = [], array $headers = []): Request
    {
        $request = new Request();

        $request->method = $method;
        $request->parameters = $parameters;
        $request->path = $path;
        $request->headers = $headers;

        return $request;
    }
}
