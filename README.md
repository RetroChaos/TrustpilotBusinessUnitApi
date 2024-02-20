# Trustpilot Business Unit API Client

A PHP library for accessing the [Trustpilot Business Unit API](https://developers.trustpilot.com/business-unit-api).

This library was originally developed and open sourced by [moneymaxim](https://www.moneymaxim.co.uk).

It has subsequently been forked and updated to use Guzzle7

## Install

Install using [composer](https://getcomposer.org/):

```sh
composer install retrochaos/trustpilot-business-unit-api
```

## Usage

```php
$client = new Trustpilot\Api\BusinessUnit\Client($apiKey);

// $client->find($domain): array
// $client->get($businessUnitId): array
// $client->getReviews($businessUnitId): array
// $client->getReviews($businessUnitId, ['perPage' => 5, 'page' => 2]): array
```
