<?php

namespace Payrex\Exceptions;

class BaseException extends \Exception
{
    private $data;
    protected array $errors;
    
    public function __construct($data)
    {
        $this->data = $data;
        $this->errors = $this->data['errors'];
    }

    public function getError()
    {
        $errors = [];

        foreach($this->errors as $error) {
            $errors[] = new \Payrex\Error($error);
        }

        return $errors;
    }
}
