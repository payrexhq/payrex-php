<?php

namespace Payrex\Entities;

class Refund extends \Payrex\Entities\BaseEntity
{
    public $id;
    public $amount;
    public $currency;
    public $status;
    public $description;
    public $livemode;
    public $remarks;
    public $reason;
    public $payment_id;
    public $metadata;
    public $created_at;
    public $updated_at;

    public function __construct($apiResource)
    {
        $data = $apiResource->data;

        $this->id = $data['id'];
        $this->amount = $data['amount'];
        $this->currency = $data['currency'];
        $this->description = $data['description'];
        $this->livemode = $data['livemode'];
        $this->remarks = $data['remarks'];
        $this->reason = $data['reason'];
        $this->payment_id = $data['payment_id'];
        $this->status = $data['status'];
        $this->metadata = empty($data['metadata']) ? null : $data['metadata'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
