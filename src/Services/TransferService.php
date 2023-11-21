<?php

namespace Payrex\Services;

class TransferService extends \Payrex\Services\BaseService {
    const URI = '/transfers';

    public function create($params) {
        $response = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI,
            'params' => $params
        ]);

        return new \Payrex\Entities\Transfer($response);
    }
}
