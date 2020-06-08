<?php

namespace Extale\Http\Responses;

use Extale\Http\Responses\Contracts\ResponseContract;

class Response implements ResponseContract
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
