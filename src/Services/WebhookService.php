<?php

namespace Payrex\Services;

class WebhookService extends \Payrex\Services\BaseService {
    const URI = '/webhooks';

    public function create($params) {
        $response = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI,
            'params' => $params
        ]);

        return new \Payrex\Entities\Webhook($response);
    }
    
    public function update($id, $params) {
        $response = $this->httpClient->request([
            'method' => 'PUT',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
            'params' => $params
        ]);

        return new \Payrex\Entities\Webhook($response);
    }

    public function retrieveList($params = []) {
        $apiResponse = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI,
            'params' => $params
        ]);

        foreach ($apiResponse->data['data'] as $key => $value) {
            $apiResponse->data['data'][$key] = new \Payrex\Entities\Webhook(
                new \Payrex\ApiResource($value)
            );
        }

        return new \Payrex\Entities\Listing($apiResponse);
    }
    
    public function retrieve($id) {
        $apiResponse = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
        ]);

        return new \Payrex\Entities\Webhook($apiResponse);
    }
    
    public function delete($id) {
        $apiResponse = $this->httpClient->request([
            'method' => 'DELETE',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
        ]);

        return new \Payrex\Entities\Deleted($apiResponse);
    }

    public function enable($id) {
      $apiResponse = $this->httpClient->request([
          'method' => 'POST',
          'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}/enable",
      ]);

      return new \Payrex\Entities\Webhook($apiResponse);
    }

    public function disable($id) {
      $apiResponse = $this->httpClient->request([
          'method' => 'POST',
          'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}/disable",
      ]);

      return new \Payrex\Entities\Webhook($apiResponse);
    }
}
