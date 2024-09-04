<?php

namespace Payrex\Entities;

class BillingStatementLineItem extends \Payrex\Entities\BaseEntity
{
    public $id;
    public $unit_price;
    public $quantity;
    public $billing_statement_id;
    public $description;
    public $livemode;
    public $created_at;
    public $updated_at;

    public function __construct($apiResource)
    {
        $data = $apiResource->data;

        $this->id = $data['id'];
        $this->unit_price = $data['unit_price'];
        $this->quantity = $data['quantity'];
        $this->billing_statement_id = $data['billing_statement_id'];
        $this->description = $data['description'];
        $this->livemode = $data['livemode'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
