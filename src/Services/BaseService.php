<?php

namespace Payrex\Services;

class BaseService {
    public $httpClient;
    public $client;

    public function __construct($client)
    {
        $this->client = $client;
        $this->httpClient = new \Payrex\HttpClient($client->config['api_key']);
    }
}