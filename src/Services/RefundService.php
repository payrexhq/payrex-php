<?php

namespace Payrex\Services;

class RefundService extends \Payrex\Services\BaseService {
    const URI = '/refunds';

    public function create($params) {
        $response = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI,
            'params' => $params
        ]);

        return new \Payrex\Entities\Refund($response);
    }

    public function update($id, $params)
    {
        $response = $this->httpClient->request([
            'method' => 'PUT',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
            'params' => $params
        ]);

        return new \Payrex\Entities\Refund($response);
    }
}
