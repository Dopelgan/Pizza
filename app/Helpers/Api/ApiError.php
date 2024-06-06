<?php

namespace App\Helpers\Api;

class ApiError extends \Error
{

    public function __construct(string $message, int $code = 0)
    {
        parent::__construct($message, $code);
    }

}
