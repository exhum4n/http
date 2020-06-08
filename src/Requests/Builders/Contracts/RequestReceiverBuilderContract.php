<?php

namespace Extale\Http\Requests\Builders\Contracts;

use Extale\Http\Requests\RequestReceiver;

interface RequestReceiverBuilderContract
{
    public function produce(): RequestReceiver;
}
