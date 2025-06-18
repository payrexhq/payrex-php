<?php

namespace Payrex;

use stdClass;

class EventData
{
  public $resource;

  const DATA_TYPES = [
    "payment_intent" => '\\Payrex\\Entities\\PaymentIntent',
    "refund" => '\\Payrex\\Entities\\Refund'
  ];

  public function __construct($data) {
    $className = self::DATA_TYPES[$data["resource"]];
    $tmpDataObject = new stdClass();
    $tmpDataObject->data = $data;
    $resource = new $className($tmpDataObject);

    $this->resource = $resource;
  }
}
