<?php

namespace Hooina\Http\Requests\Files\Factory;

use Hooina\Http\Requests\Files\RequestFile;

class RequestFileFactory extends RequestFile
{
    public function create(string $name, string $type, string $temp, int $error, int $size): RequestFile
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
