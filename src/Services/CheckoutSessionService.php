<?php

namespace Payrex\Services;

class CheckoutSessionService extends \Payrex\Services\BaseService {
    const URI = '/checkout_sessions';

    public function create($params) {
      $response = $this->httpClient->request([
          'method' => 'POST',
          'url'    => "{$this->client->apiBaseUrl}" . self::URI,
          'params' => $params
      ]);

      return new \Payrex\Entities\CheckoutSession($response);
    }

    public function retrieve($id) {
      $response = $this->httpClient->request([
          'method' => 'GET',
          'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
      ]);

      return new \Payrex\Entities\CheckoutSession($response);
    }
    
    public function list($params = []) {
      $response = $this->httpClient->request([
          'method' => 'GET',
          'url'    => "{$this->client->apiBaseUrl}" . self::URI,
          'params' => $params
      ]);

      foreach ($response->data['data'] as $key => $value) {
          $response->data['data'][$key] = new \Payrex\Entities\CheckoutSession($value);
      }

      return new \Payrex\Entities\Listing($response);
    }

    public function expire($id) {
      $response = $this->httpClient->request([
          'method' => 'POST',
          'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}/expire",
      ]);

      return new \Payrex\Entities\CheckoutSession($response);
    }
}
