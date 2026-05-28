<?php

namespace Payrex\Entities;

class PaymentMethod extends \Payrex\Entities\BaseEntity
{
    public $id;
    public $type;
    public $details;
    public $billing_details;
    public $livemode;
    public $metadata;
    public $allow_redisplay;
    public $created_at;
    public $updated_at;

    public function __construct($apiResource)
    {
        $data = $apiResource->data;

        $this->id = $data['id'];
        $this->type = $data['type'];
        $this->details = $data['details'];
        $this->billing_details = $data['billing_details'];
        $this->livemode = $data['livemode'];
        $this->metadata = $data['metadata'];
        $this->allow_redisplay = $data['allow_redisplay'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
