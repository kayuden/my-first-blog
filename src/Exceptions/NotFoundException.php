<?php

namespace Src\Exceptions;

use Exception;
use Throwable;
use Src\Controllers\Controller;

class NotFoundException extends Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function error404(): void
    {
        http_response_code(404);
        require Controller::getViewsPath() . 'errors/error404.php';
    }
}
