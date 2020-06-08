<?php

namespace Extale\Http\Routes\Contracts;

use Extale\Http\Requests\Request;
use Extale\Http\Routes\Route;

interface RouteReceiverContract
{
    public function getRoute(Request $request): Route;
}
