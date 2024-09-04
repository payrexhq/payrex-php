<?php

namespace Payrex\Services;

class BillingStatementService extends \Payrex\Services\BaseService
{
    const URI = '/billing_statements';

    public function create($params)
    {
        $response = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI,
            'params' => $params
        ]);

        return new \Payrex\Entities\BillingStatement($response);
    }

    public function retrieve($id)
    {
        $response = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
        ]);

        return new \Payrex\Entities\BillingStatement($response);
    }

    public function list($params = [])
    {
        $response = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI,
            'params' => $params
        ]);

        foreach ($response->data['data'] as $key => $value) {
            $response->data['data'][$key] = new \Payrex\Entities\BillingStatement(
                new \Payrex\ApiResource($value)
            );
        }

        return new \Payrex\Entities\Listing($response);
    }

    public function update($id, $params)
    {
        $response = $this->httpClient->request([
            'method' => 'PUT',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
            'params' => $params
        ]);

        return new \Payrex\Entities\BillingStatement($response);
    }

    public function delete($id)
    {
        $response = $this->httpClient->request([
            'method' => 'DELETE',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
        ]);

        return new \Payrex\Entities\Deleted($response);
    }

    public function finalize($id)
    {
        $response = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}/finalize",
        ]);

        return new \Payrex\Entities\BillingStatement($response);
    }

    public function void($id)
    {
        $response = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}/void",
        ]);

        return new \Payrex\Entities\BillingStatement($response);
    }

    public function markUncollectible($id)
    {
        $response = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}/mark_uncollectible",
        ]);

        return new \Payrex\Entities\BillingStatement($response);
    }
}
