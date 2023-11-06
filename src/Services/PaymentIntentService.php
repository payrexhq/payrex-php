<?php

namespace Payrex\Services;

class PaymentIntentService extends \Payrex\Services\BaseService {
    const URI = '/payment_intents';

    public function create($params) {
        $response = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI,
            'params' => $params
        ]);

        return new \Payrex\Entities\PaymentIntent($response);
    }

    public function retrieve($id) {
        $apiResponse = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
        ]);

        return new \Payrex\Entities\PaymentIntent($apiResponse);
    }
}
