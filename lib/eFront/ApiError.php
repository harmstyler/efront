<?php

namespace eFront;

/**
 * Class ApiError
 * @package eFront
 */
class ApiError extends \Exception
{
    /**
     * ApiError constructor.
     * @param null|string $message
     */
    public function __construct($message = null)
    {
        parent::__construct($message);
    }
}
