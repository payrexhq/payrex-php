<?php

namespace Payrex;
class HttpClient
{
    private $apiKey;
    const DEFAULT_CONNECTTIMEOUT = 30;
    const DEFAULT_TIMEOUT = 30;

    public function __construct($apiKey = '')
    {
        $this->apiKey = $apiKey;
    }

    public function request($opts)
    {        
        $url = $opts['url'];

        if (isset($opts['params']) && $opts['method'] === 'GET') {
            $url .= '?' . http_build_query($opts['params']);
        }

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, self::DEFAULT_CONNECTTIMEOUT);
        curl_setopt($ch, CURLOPT_TIMEOUT, self::DEFAULT_TIMEOUT);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            [
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Basic '. base64_encode($this->apiKey . ':'),
            ]
        );
        curl_setopt($ch, CURLOPT_CAINFO, \Payrex\Payrex::getCACertificateBundlePath());

        if (!\Payrex\Payrex::getVerifySslCerts()) {
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        }

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        if (in_array($opts['method'], ['DELETE', 'POST', 'PUT'])) {
            if (isset($opts['params'])) {
                // Handle payload with a mixture of single and multidimensional array.
                $single_array = [];
                $multidimensional_array = [];
                $arr_params = [];

                foreach($opts['params'] as $key => $value) {
                    if(is_array($value)) {
                        if(count($value) > 0) {
                            if(array_keys($value) !== range(0, count($value) - 1)) {
                                // associative
                                $multidimensional_array[$key] = $value;
                            } else {
                                if(is_array($value[0])) {
                                    $multidimensional_array[$key] = $value;
                                } else {
                                    $single_array[$key] = $value;
                                }
                            }
                        } else {
                            $single_array[$key] = $value;
                        }
                    } else {
                        $single_array[$key] = $value;
                    }
                }

                array_push($arr_params, preg_replace('/%5B[0-9]+%5D/simU', '%5B%5D', http_build_query($single_array)));
                array_push($arr_params, http_build_query($multidimensional_array));

                curl_setopt($ch, CURLOPT_POSTFIELDS, implode('&', $arr_params));
            }
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $opts['method']);
            curl_setopt($ch, CURLOPT_POST, 1);
        }

        $body = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $url = curl_getinfo($ch,  CURLINFO_EFFECTIVE_URL);

        if ($body === false) {
            curl_close($ch);

            throw new \Exception(curl_error($ch));
        } else {
            if ($code < 200 || $code >= 400) {
                $this->handleErrorResponse($body, $code, $url);
            }

            $jsonBody = json_decode($body, true);

            curl_close($ch);

            return new \Payrex\ApiResource($jsonBody);
        }
    }

    private function handleErrorResponse($body, $code, $url)
    {
        $jsonBody = json_decode($body, true);

        switch ($code) {
            case '401':
                $exception = new \Payrex\Exceptions\AuthenticationException($jsonBody);

                break;
            case '400':
                $exception = new \Payrex\Exceptions\InvalidRequestException($jsonBody);

                break;
            case '404':
                if(!empty($body)) {
                    $exception = new \Payrex\Exceptions\ResourceNotFoundException($jsonBody);
                } else {
                    $exception = new \Payrex\Exceptions\RouteNotFoundException("Route {$url} not found.");
                }

                break;
            default:
                $exception = new \Payrex\Exceptions\BaseException($jsonBody);

                break;
        }

        throw $exception;
    }
}
