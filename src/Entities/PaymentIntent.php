<?php

namespace Payrex\Entities;

class PaymentIntent extends \Payrex\Entities\BaseEntity
{
    public $id;
    public $amount;
    public $client_secret;
    public $currency;
    public $description;
    public $livemode;
    public $latest_payment;
    public $last_payment_error;
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
        $this->client_secret = $data['client_secret'];
        $this->currency = $data['currency'];
        $this->description = $data['description'];
        $this->livemode = $data['livemode'];
        $this->latest_payment = $data['latest_payment'];
        $this->last_payment_error = array_key_exists("last_payment_error", $data) ? $data['last_payment_error']: null;
        $this->status = $data['status'];
        $this->payment_methods = $data['payment_methods'];
        $this->payment_method_options = $data['payment_method_options'];
        $this->next_action = $data['next_action'];
        $this->metadata = empty($data['metadata']) ? null : $data['metadata'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
