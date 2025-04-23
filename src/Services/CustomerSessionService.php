<?php

namespace Payrex\Services;

class CustomerSessionService extends \Payrex\Services\BaseService {
    const URI = '/customer_sessions';

    public function create($params) {
      $response = $this->httpClient->request([
          'method' => 'POST',
          'url'    => "{$this->client->apiBaseUrl}" . self::URI,
          'params' => $params
      ]);

      return new \Payrex\Entities\CustomerSession($response);
    }

    public function retrieve($id) {
      $response = $this->httpClient->request([
          'method' => 'GET',
          'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
      ]);

      return new \Payrex\Entities\CustomerSession($response);
    }
}
