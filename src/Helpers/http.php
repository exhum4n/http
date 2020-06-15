<?php

if (function_exists('response') === false) {
    function response($content, int $statusCode = 200): Exhum4n\Http\Responses\Response
    {
        return new Exhum4n\Http\Responses\Response($content, $statusCode);
    }
}
