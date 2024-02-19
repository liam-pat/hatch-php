<?php

namespace App\enums;

enum HttpStatusCode: int
{
    case Ok = 200;
    case Created = 201;
    case Forbidden = 403;
    case InternalServerError = 500;

    public function message(): string
    {
        return match ($this) {
            self::Ok => "Success",
            self::Created => "Resource Created",
            self::Forbidden => "Forbidden Request",
            self::InternalServerError => "Server Error"
        };
    }
}