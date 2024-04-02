<?php

namespace App\enums;

class Response
{
    public const HTTP_OK = 200;

    public function __construct(private ?string $content, private HttpStatusCode $statusCode, private array $headers)
    {

    }

    public function getStatusCodeValue(): int
    {
        return $this->statusCode->value;
    }

}