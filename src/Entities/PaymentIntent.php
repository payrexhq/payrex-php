<?php

namespace Payrex\Entities;

class PaymentIntent extends \Payrex\Entities\BaseEntity
{
    public $id;
    public $amount;
    public $amount_received;
    public $amount_capturable;
    public $client_secret;
    public $currency;
    public $description;
    public $livemode;
    public $latest_payment;
    public $last_payment_error;
    public $statement_descriptor;
    public $status;
    public $payment_methods;
    public $payment_method_options;
    public $next_action;
    public $metadata;
    public $created_at;
    public $updated_at;

    public function __construct($apiResource)
    {
        $data = $apiResource->data;

        $this->id = $data['id'];
        $this->amount = $data['amount'];
        $this->amount_received = $data['amount_received'];
        $this->amount_capturable = $data['amount_capturable'];
        $this->client_secret = $data['client_secret'];
        $this->currency = $data['currency'];
        $this->description = $data['description'];
        $this->livemode = $data['livemode'];
        $this->latest_payment = $data['latest_payment'];
        $this->last_payment_error = $data['last_payment_error'];
        $this->statement_descriptor = $data['statement_descriptor'];
        $this->status = $data['status'];
        $this->payment_methods = $data['payment_methods'];
        $this->payment_method_options = $data['payment_method_options'];
        $this->next_action = $data['next_action'];
        $this->metadata = $data['metadata'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
