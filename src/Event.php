<?php

namespace Payrex;

class Event
{
  public $id;
  public $type;
  public $pending_webhooks;
  public $data;
  public $previous_attributes;
  public $created_at;
  public $updated_at;

  const EVENT_ATTRIBUTES = [
    "id",
    "type",
    "pending_webhooks",
    "data",
    "previous_attributes",
    "created_at",
    "created_at",
  ];

  public function __construct($payload) {
    $this->id = $payload["id"];
    $this->type = $payload["type"];
    $this->pending_webhooks = $payload["pending_webhooks"];
    $this->data = new \Payrex\EventData($payload["data"]);
    $this->previous_attributes = $payload["previous_attributes"];
    $this->created_at = $payload["created_at"];
    $this->updated_at = $payload["updated_at"];
  }

  public static function parse($payload) {
    $jsonPayload = json_decode($payload, true);

    foreach(self::EVENT_ATTRIBUTES as $attribute) {
      if(!isset($jsonPayload[$attribute])) {
        throw new \Payrex\Exceptions\UnexpectedValueException('Invalid payload to parse an Event');
      }
    }

    return new \Payrex\Event($jsonPayload);
  }
}