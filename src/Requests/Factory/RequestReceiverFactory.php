<?php

namespace Hooina\Http\Requests\Factory;

use Hooina\Http\Requests\Files\Factory\RequestFileFactory;
use Hooina\Http\Requests\RequestReceiver;

class RequestReceiverFactory extends RequestReceiver
{
    protected function getHeaders()
    {
        $headers = [];

        $defaultHeaders = [
            'content-type' => $_SERVER['CONTENT_TYPE'],
            'content-length' => $_SERVER['CONTENT_LENGTH'],
        ];

        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 4) === 'HTTP') {
                $headers[$this->formatHeader($name)] = $value;
            }
        }

        return array_merge($defaultHeaders, $headers);
    }

    protected function formatHeader(string $header): string
    {
        $raw = substr(strtolower($header), 5);

        return str_replace('_', '-', $raw);
    }

    protected function getPath(): string
    {
        return explode('?', $_SERVER['REQUEST_URI'], 2)[0];
    }

    protected function getFiles(): array
    {
        $files = [];

        if (is_countable($_FILES) === false) {
            return $files;
        }

        foreach ($_FILES as $key => $data) {
            $file = (new RequestFileFactory())->create(...array_values($data));

            $files[$key] = $file;
        }

        return $files;
    }

    protected function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    protected function getParams(): array
    {
        $params = [];

        $queryParams = $_GET;
        if (empty($queryParams) === false) {
            $params = $queryParams;
        }

        $postParams = $_POST;
        if (empty($postParams) === false) {
            $params = $postParams;
        }

        $requestBody = file_get_contents("php://input");
        if (empty($requestBody) === false) {
            $params = json_decode($requestBody, true);
        }

        return $params;
    }

    public function create(string $basePath): RequestReceiver
    {
        $requestReceiver = new RequestReceiver();

        $requestReceiver->method = $this->getMethod();
        $requestReceiver->path = $this->getPath();
        $requestReceiver->parameters = $this->getParams();
        $requestReceiver->headers = $this->getHeaders();
        $requestReceiver->files = $this->getFiles();
        $requestReceiver->basePath = $basePath;

        return $requestReceiver;
    }
}
