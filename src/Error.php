<?php

namespace Payrex;

class Error
{
    public $code;
    public $detail;
    public $parameter;

    public function __construct($error)
    {
        $this->code = $error['code'];
        $this->detail = $error['detail'];
        $this->parameter = array_key_exists("parameter", $error) ? $error['parameter'] : null;
    }
}