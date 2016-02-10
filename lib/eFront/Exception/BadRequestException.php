<?php

namespace eFront\Exception;

/**
 * Class BadRequestException
 * @package eFront\Exception
 */
class BadRequestException extends ApiError
{
    /**
     * BadRequestException constructor.
     * @param null $message
     */
    public function __construct($message = null)
    {
        parent::__construct($message, 400);
    }
}
