<?php

namespace App\Traits;

use GuzzleHttp\Exception\ClientException;

trait CommonTrait
{
     /**
     * send guzzle http request to our api end point and return json decoded response
     *
     * @param string $endpoint
     * @param array $params
     * @param string $method
     * @param [type] $baseUri
     * @return void
     */
    public function createApiRequest($baseUri, $method = 'GET', $params = [], $endpoint = '')
    {
        if (is_null($baseUri)) {
            $baseUri = config('constants.API_BASE_URL');
        }

        try {
            $client   = new \GuzzleHttp\Client(['base_uri' => $baseUri]);
            $response = $client->request($method, $endpoint, $params);

            return json_decode($response->getBody()->getContents(), true);
        } catch (ClientException $e) {
            return json_decode((string)$e->getResponse()->getBody());
        }
    }
    
}
