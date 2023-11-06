# PayRex PHP

PayRex PHP library provides PHP applications an easy access to the PayRex API. Explore various PHP classes that represents PayRex API resources on object instantiation.

Check [example.php](https://github.com/payrexhq/payrex-php/blob/development/example.php) see usage examples.

## Requirements

PHP 5.6.0 and later.

## Composer

You can install the library via [Composer](http://getcomposer.org/). Run the following command:

```bash
composer require payrex/payrex-php
```

To use the bindings, use Composer's [autoload](https://getcomposer.org/doc/01-basic-usage.md#autoloading):

```php
require_once('vendor/autoload.php');
```

## Manual Installation

If you prefer to manually install the library instead of using composer, you can download the [latest release](https://github.com/payrexhq/payrex-php/releases). Then, to use the bindings, include the `initialize.php` file.

```php
require_once('/path/to/payrex-php/initialize.php');
```

## Dependencies

The bindings require the following extensions in order to work properly:

-   [`curl`](https://secure.php.net/manual/en/book.curl.php)
-   [`json`](https://secure.php.net/manual/en/book.json.php)
-   [`mbstring`](https://www.php.net/manual/en/book.mbstring.php)

If you use Composer, these dependencies should be handled automatically. If you install manually, you'll want to make sure that the required extensions are available.

## Getting Started

Simple usage looks like:

```php
$client = new \Payrex\PayrexClient('Your PayRex secret api key');
$paymentIntent = $client->paymentIntents->create([
    'amount' => 10000,
    'currency' => 'PHP',
    'payment_methods' => ['card']
]);

echo $paymentIntent->id;
```

## Handle errors

```php
try {
    $client = new \Payrex\PayrexClient('Your PayRex secret api key');
    $paymentIntent = $client->paymentIntents->create([
        'amount' => 10000,
        'currency' => 'PHP',
        'payment_methods' => ['card']
    ]);
} catch(\Payrex\Exceptions\InvalidRequestException $e) {
   print "<pre>";
   print_r($e->getError());
   print "</pre>";
}
```