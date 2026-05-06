<?php

namespace Payrex\Services;

class SetupIntentService extends \Payrex\Services\BaseService
{
    const URI = '/setup_intents';

    public function create($params)
    {
        $response = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI,
            'params' => $params
        ]);

        return new \Payrex\Entities\SetupIntent($response);
    }

    public function cancel($id)
    {
        $apiResponse = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}/cancel"
        ]);

        return new \Payrex\Entities\SetupIntent($apiResponse);
    }

    public function retrieve($id)
    {
        $apiResponse = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
        ]);

        return new \Payrex\Entities\SetupIntent($apiResponse);
    }
}
