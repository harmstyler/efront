<?php

namespace eFront\Exception;

/**
 * Class MaxUsersException
 * @package eFront\Exception
 */
class MaxUsersException extends ApiError
{
    /**
     * MaxUsersException constructor.
     * @param null|string $message
     */
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
