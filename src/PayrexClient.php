<?php
 
namespace Payrex;

/**
 * Class Payrex
 *
 * @package Payrex
 */
class PayrexClient
{
    /** @var string Payrex API key used for authenticating and calling Payrex API operations. */
    public $apiKey;
    /** @var string Payrex API Base Url */
    public $apiBaseUrl = 'http://api.localhost';
    public $config;
    private $serviceFactory;

    public function __construct($apiKey = '')
    {
        $this->config = [
            'api_key' => $apiKey
        ];

        $this->serviceFactory = new \Payrex\Services\ServiceFactory();
    }
 
    public function __get($name)
    {
        $service = $this->serviceFactory->get($name);

        return new $service($this);
    }
}
