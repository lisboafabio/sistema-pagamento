<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Throwable;
use function response;

class PixErrorException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
