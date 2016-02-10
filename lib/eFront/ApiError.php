<?php

namespace eFront;

use eFront\Exception\ApiError as BaseError;

/**
 * Class ApiError
 * @package eFront
 * @deprecated To be removed in 2.0, use \eFront\Exception\ApiError
 */
class ApiError extends BaseError
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
