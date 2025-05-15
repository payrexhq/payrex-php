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
}
