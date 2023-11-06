<?php

namespace Payrex\Entities;

class BillingAddress
{
    public $city;
    public $country;
    public $line1;
    public $line2;
    public $postal_code;
    public $state;

    public function __construct($data)
    {
        $this->city = $data['city'];
        $this->country = $data['country'];
        $this->line1 = $data['line1'];
        $this->line2 = $data['line2'];
        $this->postal_code = $data['postal_code'];
        $this->state = $data['state'];
    }
}
