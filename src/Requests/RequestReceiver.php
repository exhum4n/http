<?php

namespace Extale\Http\Requests;

use Extale\Http\Requests\Builders\RequestBuilder;
use Extale\Http\Requests\Contracts\RequestReceiverContract;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class RequestReceiver implements RequestReceiverContract
{
    protected SymfonyRequest $request;

    protected array $parameters;

    protected string $basePath;

    public function getRequest(): Request
    {
        return (new RequestBuilder($this->request, $this->parameters))->produce();
    }
}
