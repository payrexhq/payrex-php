<?php

namespace Payrex\Entities;

class PayoutTransaction extends \Payrex\Entities\BaseEntity
{
    public $id;
    public $amount;
    public $net_amount;
    public $transaction_type;
    public $transaction_id;
    public $created_at;
    public $updated_at;

    public function __construct($apiResource)
    {
        $data = $apiResource->data;

        $this->id = $data['id'];
        $this->amount = $data['amount'];
        $this->net_amount = $data['net_amount'];
        $this->transaction_type = $data['transaction_type'];
        $this->transaction_id = $data['transaction_id'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
