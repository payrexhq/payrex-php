<?php

namespace Payrex\Entities;

class Customer extends \Payrex\Entities\BaseEntity
{
    public $id;
    public $billing_statement_prefix;
    public $currency;
    public $email;
    public $livemode;
    public $name;
    public $metadata;
    public $next_billing_statement_sequence_number;
    public $created_at;
    public $updated_at;

    public function __construct($apiResource)
    {
        $data = $apiResource->data;

        $this->id = $data['id'];
        $this->billing_statement_prefix = $data['billing_statement_prefix'];
        $this->currency = $data['currency'];
        $this->email = $data['email'];
        $this->livemode = $data['livemode'];
        $this->name = $data['name'];
        $this->metadata = $data['metadata'];
        $this->next_billing_statement_sequence_number = $data['next_billing_statement_sequence_number'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
