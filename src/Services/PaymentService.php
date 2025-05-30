<?php

namespace Payrex\Services;

class PaymentService extends \Payrex\Services\BaseService {
    const URI = '/payments';

    public function retrieve($id) {
        $apiResponse = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
        ]);

        return new \Payrex\Entities\Payment($apiResponse);
    }

    public function update($id, $params) {
        $response = $this->httpClient->request([
            'method' => 'PUT',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
            'params' => $params
        ]);

        return new \Payrex\Entities\Payment($response);
    }
}
