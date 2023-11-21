<?php

namespace Payrex\Entities;

class Transfer extends \Payrex\Entities\BaseEntity
{
    public $id;
    public $amount;
    public $currency;
    public $source;
    public $destination;
    public $livemode;
    public $description;
    public $transfer_group;
    public $created_at;
    public $updated_at;

    public function __construct($apiResource)
    {
        $data = $apiResource->data;

        $this->id = $data['id'];
        $this->amount = $data['amount'];
        $this->currency = $data['currency'];
        $this->source = $data['source'];
        $this->destination = $data['destination'];
        $this->livemode = $data['livemode'];
        $this->description = $data['description'];
        $this->transfer_group = $data['transfer_group'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
