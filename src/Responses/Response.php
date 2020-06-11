<?php

namespace Hooina\Http\Responses;

use Hooina\Http\Responses\Interfaces\ResponseInterface;

class Response implements ResponseInterface
{
    protected array $content;

    public function __construct(array $content)
    {
        $this->content = $content;
    }

    public function send()
    {
        return print_r(json_encode($this->content));
    }
}
