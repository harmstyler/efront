<?php

namespace eFront\Exception;

class ForbiddenException extends ApiError
{
    public function __construct($message)
    {
        parent::__construct($message, 403);
    }
}
