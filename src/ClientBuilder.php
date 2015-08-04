<?php
/**
 * Copyright (c) 2015 Shaun Hardy <party.hardy247@gmail.com>.
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace SMH\Enom;

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

    public function __construct()
    {
        $this->withGuzzle();
        $this->withJMSSerializer();
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
        return new Client($this->transport, $this->serializer, $username, $password, $this->endpoint);
    }

    public function usingProduction()
    {
        $this->endpoint = static::ENDPOINT_PRODUCTION;
    }

    public function usingTest()
    {
        $this->endpoint = static::ENDPOINT_TEST;
    }

    public function withGuzzle()
    {
        $this->transport = new \GuzzleHttp\Client();
    }

    public function withJMSSerializer()
    {
        $this->serializer = \JMS\Serializer\SerializerBuilder::create()->build();
    }
}
