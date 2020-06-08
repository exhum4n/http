<?php

namespace Extale\Http\Requests\Contracts;

use Extale\Http\Requests\Request;

interface RequestReceiverContract
{
    public function getRequest(): Request;
}
