<?php

namespace Extale\Http\Builders\Contracts;

use Extale\Http\Contracts\KernelContract;

interface KernelBuilderContract
{
    public function produce(): KernelContract;
}
