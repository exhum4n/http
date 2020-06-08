<?php

namespace Extale\Http\Requests\Builders\Contracts;

use Extale\Http\Requests\Request;

interface RequestBuilderContract
{
    public function produce(): Request;
}
