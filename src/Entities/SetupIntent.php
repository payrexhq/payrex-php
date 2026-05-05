<?php

namespace Payrex\Entities;

class SetupIntent extends \Payrex\Entities\BaseEntity
{
    public $id;
    public $livemode;
    public $client_secret;
    public $next_action;
    public $payment_methods;
    public $return_url;
    public $status;
    public $usage;
    public $customer;
    public $description;
    public $created_at;
    public $updated_at;

    public function __construct($apiResource)
    {
        $data = $apiResource->data;

        $this->id = $data['id'];
        $this->livemode = $data['livemode'];
        $this->client_secret = $data['client_secret'];
        $this->next_action = $data['next_action'];
        $this->payment_methods = $data['payment_methods'];
        $this->return_url = $data['return_url'];
        $this->status = $data['status'];
        $this->usage = $data['usage'];
        $this->customer = $data['customer'];
        $this->description = $data['description'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
