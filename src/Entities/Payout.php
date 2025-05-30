<?php

namespace Payrex\Entities;

class Payout extends \Payrex\Entities\BaseEntity
{
    public $id;
    public $amount;
    public $destination;
    public $livemode;
    public $net_amount;
    public $status;
    public $created_at;
    public $updated_at;

    public function __construct($apiResource)
    {
        $data = $apiResource->data;

        $this->id = $data['id'];
        $this->amount = $data['amount'];
        $this->destination = $data['destination'];
        $this->livemode = $data['livemode'];
        $this->net_amount = $data['net_amount'];
        $this->status = $data['status'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
