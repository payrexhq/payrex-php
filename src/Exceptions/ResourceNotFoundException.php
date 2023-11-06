<?php

namespace Payrex\Exceptions;

class ResourceNotFoundException extends \Payrex\Exceptions\BaseException
{
    public function getError()
    {
        return new \Payrex\Error($this->errors[0]);
    }
}