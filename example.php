<?php
 
//use init.php when not using composer's autoload
//require '/pathtopayrex/init.php'
// This require is for demo purposes only. If you're using composer, require using its autoloader. Please check the README.md for more info.
require 'initialize.php';

// Initialize the client
$client = new \Payrex\PayrexClient('insert your PayRex Secret API key.');

// Error handling
try {
    $client = new \Payrex\PayrexClient('invalid secret api key');
    // Some payrex API calls
} catch (\Payrex\Exceptions\AuthenticationException $e) {
    // handle error if api key is invalid.
}

try {
    $client = new \Payrex\PayrexClient('secret API key');
    $paymentIntent = $client->paymentIntents->create([
        // incorrect payload
    ]);
} catch (\Payrex\Exceptions\InvalidRequestException $e) {
    // handle error if there's validation error
    foreach($e->getError() as $error) {
        echo $error->code;
        echo $error->detail;
    }
}

// Create a payment intent
$newPaymentIntent = $client->paymentIntents->create([
    'amount' => 10000,
    'currency' => 'PHP',
    'payment_methods' => ['card', 'gcash']
    // other payload
]);

// Retrieve a payment intent
$paymentIntent = $client->paymentIntents->retrieve('insert payment intent id here.');
echo $paymentIntent->id;

// Refund a payment
$refund = $client->refunds->create([
    'amount' => 10000,
    'currency' => 'PHP',
    'payment_id' => 'replace with payment id to be refunded',
    "reason" => 'fraudulent',
    // other optional payload.
]);

// Create a connect merchant
$connect_merchant = $client->merchants->create([
    'connection_type' => 'standard',
]);

// Create a transfer
$transfer = $client->transfers->create([
    'amount' => 5000,
    'currency' => 'PHP',
    'source' => 'insert payment id to transfer amount',
    'destination' => 'insert connect merchant id that will receive the transfer'
    // other optional payload.
]);