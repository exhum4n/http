<?php

namespace Extale\Http\Routes\Contracts;

interface RouteContract
{
    public function getAction(): string;

    public function getController(): string;

    public function getMethod(): string;
}
