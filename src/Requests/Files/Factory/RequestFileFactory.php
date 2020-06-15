<?php

namespace Exhum4n\Http\Requests\Files\Factory;

use Exhum4n\Http\Requests\Files\RequestFile;
use Exhum4n\Interfaces\Http\Requests\Files\Factory\RequestFileFactoryInterface;
use Exhum4n\Interfaces\Http\Requests\Files\RequestFileInterface;

class RequestFileFactory extends RequestFile implements RequestFileFactoryInterface
{
    public function create(string $name, string $type, string $temp, int $error, int $size): RequestFileInterface
    {
        $file = new RequestFile();

        $file->name = $name;
        $file->type = $type;
        $file->temp = $temp;
        $file->size = $size;
        $file->error = $error;

        return $file;
    }
}
