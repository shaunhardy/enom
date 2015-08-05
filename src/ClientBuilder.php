<?php
/**
 * Copyright (c) 2015 Shaun Hardy <party.hardy247@gmail.com>.
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace SMH\Enom;

use SMH\Enom\Serializer\JMSSerializer;
use SMH\Enom\Serializer\SerializerInterface;
use SMH\Enom\Transport\GuzzleTransport;
use SMH\Enom\Transport\TransportInterface;

class ClientBuilder
{
    const ENDPOINT_PRODUCTION = 'https://reseller.enom.com/interface.asp';
    const ENDPOINT_TEST = 'https://resellertest.enom.com/interface.asp';

    private $transport;
    private $serializer;
    private $endpoint;

    /**
     * Create a new ClientBuilder
     *
     * @return ClientBuilder
     */
    public static function create()
    {
        return new ClientBuilder();
    }

    /**
     * Build the client
     *
     * @param $username
     * @param $password
     * @return Client
     */
    public function build($username, $password)
    {
        $client = new Client(
            $this->transport ?: new GuzzleTransport(),
            $this->serializer ?: new JMSSerializer(),
            $username,
            $password,
            $this->endpoint ?: static::ENDPOINT_PRODUCTION
        );

        return $client;
    }

    /**
     * Use a custom transport
     *
     * @param TransportInterface $transport
     * @return ClientBuilder
     */
    public function withTransport(TransportInterface $transport)
    {
        $this->transport = $transport;

        return $this;
    }

    /**
     * Use a custom serializer
     *
     * @param SerializerInterface $serializer
     * @return ClientBuilder
     */
    public function withSerializer(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;

        return $this;
    }

    /**
     * Use a custom endpoint URL
     *
     * @param $endpoint string URL to the eNom API endpoint
     * @return ClientBuilder
     */
    public function withEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * Use the Production environment endpoint
     *
     * @return ClientBuilder
     */
    public function usingProductionEndpoint()
    {
        $this->withEndpoint(static::ENDPOINT_PRODUCTION);

        return $this;
    }

    /**
     * Use the Test environment endpoint
     *
     * @return ClientBuilder
     */
    public function usingTestingEndpoint()
    {
        $this->withEndpoint(static::ENDPOINT_TEST);

        return $this;
    }
}
