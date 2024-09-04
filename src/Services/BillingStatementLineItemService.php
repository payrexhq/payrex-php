<?php

namespace Payrex\Services;

class BillingStatementLineItemService extends \Payrex\Services\BaseService
{
    const URI = '/billing_statement_line_items';

    public function create($params)
    {
        $response = $this->httpClient->request([
            'method' => 'POST',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI,
            'params' => $params
        ]);

        return new \Payrex\Entities\BillingStatementLineItem($response);
    }

    public function retrieve($id)
    {
        $response = $this->httpClient->request([
            'method' => 'GET',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
        ]);

        return new \Payrex\Entities\BillingStatementLineItem($response);
    }

    public function update($id, $params)
    {
        $response = $this->httpClient->request([
            'method' => 'PUT',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
            'params' => $params
        ]);

        return new \Payrex\Entities\BillingStatementLineItem($response);
    }

    public function delete($id)
    {
        $response = $this->httpClient->request([
            'method' => 'DELETE',
            'url'    => "{$this->client->apiBaseUrl}" . self::URI . "/{$id}",
        ]);

        return new \Payrex\Entities\Deleted($response);
    }
}
