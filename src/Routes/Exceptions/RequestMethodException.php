<?php

namespace Exhum4n\Http\Routes\Exceptions;

use Exception;
use Throwable;

class RequestMethodException extends Exception
{
    public function __construct($message = "This request method not supported", $code = 403, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
