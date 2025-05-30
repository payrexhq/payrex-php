<?php
 
//use init.php when not using composer's autoload
//require '/pathtopayrex/init.php'
// This require is for demo purposes only. If you're using composer, require using its autoloader. Please check the README.md for more info.
require 'initialize.php';

// Initialize the client
$client = new \Payrex\PayrexClient('sk_live_xwMfXzuxAFBa8t6thSjAp9ed9HUpUHez');

$customer = $client->customers->create([
    'currency' => 'PHP',
    'name' => 'test',
    'email' => 'test@gmail.com'
]);

$billingStatement = $client->billingStatements->create([
'currency' => 'PHP',
'payment_settings' => [
    'payment_methods' => ['card', 'gcash']
],
'customer_id' => $customer->id,
]);

$billingStatement = $client->billingStatements->delete($billingStatement->id);

print "<pre>";
print_r($billingStatement);
print "</pre>";
die();

/* try {
    $payoutTransactions = $client->payouts->list_transactions(
        'po_XG8frmLJqtiYz4jrP39UXwSZYDyNpzjs',
        [
            'limit' => 2,
            'after' => 'po_txn_e935EF1mm7vcYaCbV2CcbxxjSYBfUkun'
        ]
    );

    if($payoutTransactions->has_more) {
        foreach($payoutTransactions->data as $row) {
            // push to SAP
            if($row->transaction_type == 'payment') {
                $grossAmount = $row->;
                $paymentId = $row->transaction_id;
            }
        }
    }


    print "<pre>";
    print_r($payoutTransactions);
    print "</pre>";
    die();
} catch (\Payrex\Exceptions\InvalidRequestException $e) {
    // handle error if there's validation error
    foreach($e->getError() as $error) {
        echo $error->code;
        echo $error->detail;
    }
} */

// Error handling
/* try {
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

// Create a webhook
$webhook = $client->webhooks->create([
    'url' => 'https://google3.com',
    'description' => 'test description',
    'events' => ['payment_intent.succeeded'],
]); */