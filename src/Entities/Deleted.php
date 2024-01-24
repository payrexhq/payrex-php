<?php

namespace Payrex\Entities;

class Deleted extends \Payrex\Entities\BaseEntity
{
    public $id;

    public function __construct($apiResource)
    {
        $data = $apiResource->data;

        $this->id = $data['id'];
    }
}
