<?php

namespace Payrex\Services;

class PayoutService extends \Payrex\Services\BaseService {
    const URI = '/payouts';

    public function listTransactions($id, $params = []) {
        $apiResponse = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}/transactions",
            'params' => $params
        ]);

        foreach ($apiResponse->data['data'] as $key => $value) {
            $apiResponse->data['data'][$key] = new \Payrex\Entities\PayoutTransaction(
                new \Payrex\ApiResource($value)
            );
        }

        return new \Payrex\Entities\Listing($apiResponse);
    }
}
