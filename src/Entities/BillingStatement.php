<?php

namespace Payrex\Entities;

class BillingStatement extends \Payrex\Entities\BaseEntity
{
    public $id;
    public $amount;
    public $currency;
    public $customer_id;
    public $description;
    public $due_at;
    public $finalized_at;
    public $billing_details_collection;
    public $billing_statement_merchant_name;
    public $billing_statement_number;
    public $billing_statement_url;
    public $line_items;
    public $livemode;
    public $metadata;
    public $payment_intent;
    public $statement_descriptor;
    public $status;
    public $payment_settings;
    public $customer;
    public $created_at;
    public $updated_at;

    public function __construct($apiResource)
    {
        $data = $apiResource->data;

        $this->id = $data['id'];
        $this->amount = $data['amount'];
        $this->currency = $data['currency'];
        $this->customer_id = $data['customer_id'];
        $this->description = $data['description'];
        $this->due_at = $data['due_at'];
        $this->finalized_at = $data['finalized_at'];
        $this->billing_details_collection = $data['billing_details_collection'];
        $this->billing_statement_merchant_name = $data['billing_statement_merchant_name'];
        $this->billing_statement_number = $data['billing_statement_number'];
        $this->billing_statement_url = $data['billing_statement_url'];
        $this->line_items = $data['line_items'];
        $this->livemode = $data['livemode'];
        $this->metadata = $data['metadata'];
        $this->payment_intent = $data['payment_intent'];
        $this->statement_descriptor = $data['statement_descriptor'];
        $this->status = $data['status'];
        $this->payment_settings = $data['payment_settings'];
        $this->customer = $data['customer'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
