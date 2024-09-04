<?php

namespace Payrex\Entities;

class Deleted extends \Payrex\Entities\BaseEntity
{
    public $id;
    public $deleted;

    public function __construct($apiResource)
    {
        $data = $apiResource->data;

        $this->id = $data['id'];
        $this->deleted = $data['deleted'];
    }
}
