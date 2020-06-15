<?php

namespace Exhum4n\Http\Requests;

use Exhum4n\Http\Requests\Factory\RequestFactory;
use Exhum4n\Interfaces\Http\Requests\RequestReceiverInterface;
use Exhum4n\Http\Requests\Traits\Globals;

class RequestReceiver implements RequestReceiverInterface
{
    use Globals;

    /**
     * Receive request and create using factory
     *
     * @return Request
     */
    public function getRequest(): Request
    {
        return (new RequestFactory(Request::class))->create($this->getRequestData());
    }
}
