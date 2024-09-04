<?php

namespace Payrex\Entities;

class CheckoutSession extends \Payrex\Entities\BaseEntity
{
    public $id;
    public $customer_reference_id;
    public $client_secret;
    public $status;
    public $currency;
    public $line_items;
    public $livemode;
    public $url;
    public $payment_intent;
    public $metadata;
    public $success_url;
    public $cancel_url;
    public $payment_methods;
    public $description;
    public $submit_type;
    public $expires_at;
    public $created_at;
    public $updated_at;

    public function __construct($apiResource)
    {
        $data = $apiResource->data;

        $this->id = $data['id'];
        $this->customer_reference_id = $data['customer_reference_id'];
        $this->client_secret = $data['client_secret'];
        $this->status = $data['status'];
        $this->currency = $data['currency'];
        $this->line_items = $data['line_items'];
        $this->livemode = $data['livemode'];
        $this->url = $data['url'];
        $this->payment_intent = $data['payment_intent'];
        $this->metadata = $data['metadata'];
        $this->success_url = $data['success_url'];
        $this->cancel_url = $data['cancel_url'];
        $this->payment_methods = $data['payment_methods'];
        $this->description = $data['description'];
        $this->submit_type = $data['submit_type'];
        $this->expires_at = $data['expires_at'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
