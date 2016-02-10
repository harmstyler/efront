<?php

namespace eFront\Exception;

/**
 * Class UserNotFoundException
 * @package eFront\Exception
 */
class UserNotFoundException extends ApiError
{
    /**
     * UserNotFoundException constructor.
     * @param null $message
     */
    public function __construct($message = null)
    {
        parent::__construct($message, 404);
    }
}
