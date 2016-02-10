<?php

namespace eFront\Exception;

use Exception;

/**
 * Class ApiError
 * @package eFront
 */
class ApiError extends Exception
{
    /**
     * ApiError constructor.
     * @param null|string $message
     * @param int $code
     * @param null|Exception $previous
     */
    public function __construct($message = null, $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
