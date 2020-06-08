<?php

namespace Extale\Http\Routes\Builders\Contracts;

use Extale\Http\Routes\Contracts\RouteReceiverContract;

interface RouteReceiverBuilderContract
{
    public function produce(): RouteReceiverContract;
}
