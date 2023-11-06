<?php

namespace Payrex;

class ApiResource
{
    public $data;

    public function __construct($response)
    {
        $this->data = $response;
    }
}