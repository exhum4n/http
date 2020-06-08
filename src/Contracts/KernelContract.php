<?php

namespace Extale\Http\Contracts;

use Extale\Http\Responses\Contracts\ResponseContract;

interface KernelContract
{
    public function handle(): ResponseContract;
}
