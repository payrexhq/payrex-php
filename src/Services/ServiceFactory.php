<?php

namespace Payrex\Services;

class ServiceFactory
{
    private $classes = [
        'billingStatements'         => \Payrex\Services\BillingStatementService::class,
        'billingStatementLineItems' => \Payrex\Services\BillingStatementLineItemService::class,
        'checkoutSessions'          => \Payrex\Services\CheckoutSessionService::class,
        'customerSessions'          => \Payrex\Services\CustomerSessionService::class,
        'customers'                 => \Payrex\Services\CustomerService::class,
        'payments'                  => \Payrex\Services\PaymentService::class,
        'paymentIntents'            => \Payrex\Services\PaymentIntentService::class,
        'refunds'                   => \Payrex\Services\RefundService::class,
        'webhooks'                  => \Payrex\Services\WebhookService::class
    ];

    public function get($name)
    {
        if (\array_key_exists($name, $this->classes)) {
            return $this->classes[$name];
        } else {
            throw new \Payrex\Exceptions\InvalidServiceException("Service " . $name . " does not exists.");
        }
    }
}
