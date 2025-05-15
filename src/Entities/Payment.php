<?php

namespace Payrex\Entities;

class Payment extends \Payrex\Entities\BaseEntity
{
    public $id;
    public $amount;
    public $amount_refunded;
    public $billing;
    public $currency;
    public $description;
    public $fee;
    public $livemode;
    public $metadata;
    public $net_amount;
    public $payment_intent_id;
    public $status;
    public $customer;
    public $payment_method;
    public $refunded;
    public $created_at;
    public $updated_at;

    public function __construct($apiResource)
    {
        $data = $apiResource->data;

        $this->id = $data['id'];
        $this->amount = $data['amount'];
        $this->amount_refunded = $data['amount_refunded'];
        $this->billing = $data['billing'];
        $this->currency = $data['currency'];
        $this->description = $data['description'];
        $this->fee = $data['fee'];
        $this->livemode = $data['livemode'];
        $this->metadata = $data['metadata'];
        $this->net_amount = $data['net_amount'];
        $this->payment_intent_id = $data['payment_intent_id'];
        $this->status = $data['status'];
        $this->customer = $data['customer'];
        $this->payment_method = $data['payment_method'];
        $this->refunded = $data['refunded'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
