<?php

namespace Payrex\Entities;

class CustomerSession extends \Payrex\Entities\BaseEntity
{
    public $id;
    public $customer_id;
    public $client_secret;
    public $livemode;
    public $components;
    public $expired;
    public $expired_at;
    public $created_at;
    public $updated_at;

    public function __construct($apiResource)
    {
        $data = $apiResource->data;

        $this->id = $data['id'];
        $this->customer_id = $data['customer_id'];
        $this->client_secret = $data['client_secret'];
        $this->livemode = $data['livemode'];
        $this->components = $data['components'];
        $this->expired = $data['expired'];
        $this->expired_at = $data['expired_at'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
