<?php

namespace Payrex\Services;

class CustomerService extends \Payrex\Services\BaseService {
    const URI = '/customers';

    public function create($params) {
      $response = $this->httpClient->request([
          'method' => 'POST',
          'url'    => "{$this->client->apiBaseUrl}" . self::URI,
          'params' => $params
      ]);

      return new \Payrex\Entities\Customer($response);
    }

    public function retrieve($id) {
      $response = $this->httpClient->request([
          'method' => 'GET',
          'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
      ]);

      return new \Payrex\Entities\Customer($response);
    }
    
    public function retrieveList($params = []) {
      $response = $this->httpClient->request([
          'method' => 'GET',
          'url'    => "{$this->client->apiBaseUrl}" . self::URI,
          'params' => $params
      ]);

      foreach ($response->data['data'] as $key => $value) {
          $response->data['data'][$key] = new \Payrex\Entities\Customer(
            new \Payrex\ApiResource($value)
          );
      }

      return new \Payrex\Entities\Listing($response);
    }

    public function update($id, $params) {
      $response = $this->httpClient->request([
          'method' => 'PUT',
          'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
          'params' => $params
      ]);

      return new \Payrex\Entities\Customer($response);
    }

    public function delete($id) {
      $response = $this->httpClient->request([
          'method' => 'DELETE',
          'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
      ]);

      return new \Payrex\Entities\Deleted($response);
    }
}
