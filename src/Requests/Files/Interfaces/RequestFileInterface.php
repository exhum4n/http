<?php

namespace Hooina\Http\Requests\Files\Interfaces;

interface RequestFileInterface
{
    public function getName();

    public function getKey();

    public function getType();

    public function getError();

    public function getTemp();

    public function getSize();
}
