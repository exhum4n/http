<?php

namespace Hooina\Http\Requests\Files;

use Hooina\Http\Requests\Files\Interfaces\RequestFileInterface;

class RequestFile implements RequestFileInterface
{
    protected string $name;
    protected string $key;
    protected string $type;
    protected string $temp;
    protected int $error;
    protected int $size;

    public function getName()
    {
        return $this->name;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getError()
    {
        return $this->error;
    }

    public function getTemp()
    {
        return $this->temp;
    }

    public function getSize()
    {
        return $this->size;
    }
}
