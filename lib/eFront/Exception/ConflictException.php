<?php

namespace eFront\Exception;

/**
 * Class ConflictException
 * @package eFront\Exception
 */
class ConflictException extends ApiError
{
    /**
     * ConflictException constructor.
     * @param null|string $message
     */
    public function __construct($message)
    {
        parent::__construct($message, 409);
    }
}
