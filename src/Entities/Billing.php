<?php

namespace Payrex\Entities;

class Billing
{
    public $address;
    public $email;
    public $name;
    public $phone;

    public function __construct($data)
    {
        $this->address = new \Payrex\Entities\BillingAddress($data['address']);
        $this->email = $data['email'];
        $this->name = $data['name'];
        $this->phone = $data['phone'];
    }
}