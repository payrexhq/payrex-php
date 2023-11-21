<?php

namespace Payrex\Services;

class MerchantService extends \Payrex\Services\BaseService {
    const URI = '/merchants';

    public function create($params) {
        $response = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI,
            'params' => $params
        ]);

        return new \Payrex\Entities\Merchant($response);
    }
}
