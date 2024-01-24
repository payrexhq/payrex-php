<?php

namespace Payrex\Entities;

class Webhook extends \Payrex\Entities\BaseEntity
{
    public $id;
    public $secret_key;
    public $status;
    public $description;
    public $livemode;
    public $url;
    public $events;
    public $created_at;
    public $updated_at;

    public function __construct($apiResource)
    {
        $data = isset($apiResource->data) ? $apiResource->data : $apiResource;

        $this->id = $data['id'];
        $this->secret_key = $data['secret_key'];
        $this->status = $data['status'];
        $this->description = $data['description'];
        $this->livemode = $data['livemode'];
        $this->url = $data['url'];
        $this->events = $data['events'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
    }
}
