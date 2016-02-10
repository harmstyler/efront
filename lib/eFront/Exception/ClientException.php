<?php

namespace eFront\Exception;

use Exception;

/**
 * Class ClientException
 * @package eFront\Exception
 */
class ClientException extends ApiError
{
    /**
     * ClientException constructor.
     * @param null|string $message
     * @param Exception $previous
     */
    public function __construct($message, Exception $previous = null)
    {
        parent::__construct($message, 500, $previous);
    }
}
