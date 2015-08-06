<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Tests;

use SMH\Enom\Client;
use SMH\Enom\Request\GetAllDomainsRequest;
use SMH\Enom\Serializer\JMSSerializer;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function testSendRequest()
    {
        $xml = file_get_contents(__DIR__.'/mock/GetAllDomainsResponse.xml');

        $transport = $this->getMockBuilder('SMH\\Enom\\Transport\\TransportInterface')
            ->getMock();

        $transport->method('get')
            ->willReturn($xml);

        $serializer = new JMSSerializer();

        $username = 'user';
        $password = 'pass';
        $endpoint = 'https://resellertest.enom.com/interface.asp';

        $client = new Client($transport, $serializer, $username, $password, $endpoint);
        $request = new GetAllDomainsRequest();

        $response = $client->sendRequest($request);

        $this->assertInstanceOf('SMH\\Enom\\Response\\GetAllDomainsResponse', $response);
    }

    /**
     * @expectedException SMH\Enom\Exception\ValidationException
     * @expectedExceptionMessage Bad User name or Password - 3
     */
    public function testBadUsernamePassword()
    {
        $xml = file_get_contents(__DIR__.'/mock/BadUsernamePassword.xml');

        $transport = $this->getMockBuilder('SMH\\Enom\\Transport\\TransportInterface')
            ->getMock();

        $transport->method('get')
            ->willReturn($xml);

        $serializer = new JMSSerializer();

        $username = 'user';
        $password = 'pass';
        $endpoint = 'https://resellertest.enom.com/interface.asp';

        $client = new Client($transport, $serializer, $username, $password, $endpoint);
        $request = new GetAllDomainsRequest();

        $client->sendRequest($request);
    }
}
