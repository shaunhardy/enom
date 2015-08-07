<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Transport;

use GuzzleHttp\Client;
use SMH\Enom\Exception\TransportException;

class GuzzleTransport implements TransportInterface
{
    /** @var \GuzzleHttp\Client */
    private $client;

    public function __construct()
    {
        $this->initialize();
    }

    private function initialize()
    {
        $this->client = new Client([
            'verify' => __DIR__.'/../../resources/enom.pem'
        ]);
    }

    /**
     * Send a HTTP GET request
     *
     * @param $url
     * @param array $queryParameters
     * @return string
     * @throws TransportException
     */
    public function get($url, array $queryParameters)
    {
        try {
            return (string) $this->client->request('GET', $url, ['query' => $queryParameters])->getBody();
        } catch (\RuntimeException $ex) {
            throw new TransportException($ex->getMessage(), null, $ex);
        }
    }
}
