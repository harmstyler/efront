<?php

namespace eFront\Exception;

/**
 * Class UnauthorizedException
 * @package eFront\Exception
 */
class UnauthorizedException extends ApiError
{
    /**
     * UnauthorizedException constructor.
     * @param null|string $message
     */
    public function __construct($message)
    {
        parent::__construct($message, 401);
    }
}
