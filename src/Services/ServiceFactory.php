<?php

namespace Payrex\Services;

class ServiceFactory
{
    private $classes = [
        'merchants'        => \Payrex\Services\MerchantService::class,
        'checkoutSessions' => \Payrex\Services\CheckoutSessionService::class,
        'paymentIntents'   => \Payrex\Services\PaymentIntentService::class,
        'refunds'          => \Payrex\Services\RefundService::class,
        'transfers'        => \Payrex\Services\TransferService::class,
        'webhooks'         => \Payrex\Services\WebhookService::class
    ];

    public function get($name)
    {
        if(\array_key_exists($name, $this->classes)) {
            return $this->classes[$name];
        } else {
            throw new \Payrex\Exceptions\InvalidServiceException("Service " . $name . " does not exists.");
        }
    }
}
