<?php

namespace Extale\Http\Routes\Builders\Contracts;

use Extale\Http\Routes\Route;

interface RouteBuilderContract
{
    public function produce(): Route;
}
