<?php

namespace Src\Exceptions;

use Exception;
use Throwable;

require_once '../Config/Config.php';

class NotFoundException extends Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function error404(): void
    {
        http_response_code(404);
        require VIEWS . 'errors/error404.php';
    }
}
