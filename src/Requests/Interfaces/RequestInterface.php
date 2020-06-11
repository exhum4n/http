<?php

namespace Hooina\Http\Requests\Interfaces;

interface RequestInterface
{
    public function all(): array;

    public function get(string $key);

    public function getRequestPath(): string;

    public function getMethod(): string;
}
