# Changelog

## [1.6.2] - 2025-06-02

- Remove unused attribute

## [1.6.1] - 2025-06-02

- Return net_amount in Payout Transaction resource.

## [1.6.0] - 2025-05-30
- Add update payment endpoint.

## [1.5.2] - 2025-05-30
- Change .list_transactions method to .listTransactions

## [1.5.1] - 2025-05-30
- Code improvement handling http request.

## [1.5.0] - 2025-05-30

- Add list payout transactions endpoint.
- Add Payout and PayoutTransaction resources.

## [1.4.0] - 2025-05-15

- Add get payment by id endpoint.

## [1.3.0] - 2025-04-23

- Add customer session endpoints.

## [1.2.1] - 2025-04-23

- Add update support for refunds.

## [1.2.0] - 2025-02-07

- Add billing_details_collection support for billing statements.

## [1.1.0] - 2025-02-07

- Add statement_descriptor support for payment intents.
- Add statement_descriptor support for billing statements.

## [1.0.2] - 2025-02-03

- billing_details_collection support for PayRex Checkout.

## [1.0.1] - 2024-10-02

- Add send billing statement via email endpoint.

## [1.0.0] - 2024-09-04

- Add billing statement endpoints
- Add customer endpoints

Breaking change
- Standardize the use of arrays in resources. The `payment_intent` attribute of CheckoutSession resource is now an array. Previously, this attribute is a PaymentIntent resource.

## [0.1.5] - 2024-07-30

- Add amount_capturable and amount_received for hold then capture partial amount support.

## [0.1.4] - 2024-07-26

- Remove typed declaration in BaseException class to support merchants with PHP version below 7.4. Typed declaration was released in 7.4.

## [0.1.3] - 2024-07-24

- Adjust building of parameter query due to changes in checkout session endpoints.

## [0.1.2] - 2024-07-24

- Add checkout session endpoints.

## [0.0.0] - 2023-11-06

- Initial alpha release.
