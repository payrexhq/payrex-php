<?php

namespace Payrex\Entities;

class Merchant extends \Payrex\Entities\BaseEntity
{
    public $id;
    public $connection_type;
    public $livemode;
    public $created_at;
    public $updated_at;

    public function __construct($apiResource)
    {
        $data = $apiResource->data;

        $this->id = $data['id'];
        $this->connection_type = $data['connection_type'];
        $this->livemode = $data['livemode'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
