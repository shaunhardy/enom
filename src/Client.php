<?php
/**
 * Copyright (c) 2015 Shaun Hardy <party.hardy247@gmail.com>.
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace SMH\Enom;

use GuzzleHttp\ClientInterface as TransportInterface;
use GuzzleHttp\Exception\GuzzleException;
use JMS\Serializer\Exception\RuntimeException as SerializerRuntimeException;
use JMS\Serializer\SerializerInterface;
use SMH\Enom\Exception\RequestException;
use SMH\Enom\Exception\SerializationException;
use SMH\Enom\Exception\ValidationException;
use SMH\Enom\Request\RequestInterface;
use SMH\Enom\Response\BaseResponse;

class Client
{
    private $transport;
    private $serializer;
    private $username;
    private $password;
    private $endpoint;

    /**
     * @param TransportInterface $transport
     * @param SerializerInterface $serializer
     * @param $username
     * @param $password
     * @param $endpoint
     */
    public function __construct(TransportInterface $transport, SerializerInterface $serializer, $username, $password, $endpoint)
    {
        $this->transport = $transport;
        $this->serializer = $serializer;
        $this->username = $username;
        $this->password = $password;
        $this->endpoint = $endpoint;
    }

    /**
     * Send an API request to eNom
     *
     * @param RequestInterface $request
     * @return BaseResponse
     * @throws RequestException
     */
    public function sendRequest(RequestInterface $request)
    {
        try {
            $xml = (string)$this->transport->request('GET', $this->endpoint, ['query' => $request->toArray()]);
            $this->handleErrors($xml);
            $response = $this->serializer->deserialize($xml, 'SMH\\Enom\\Response\\BaseResponse', 'XML');

            return $response;
        } catch (GuzzleException $ex) {
            throw new RequestException($ex->getMessage(), null, $ex);
        } catch (SerializerRuntimeException $ex) {
            throw new SerializationException($ex->getMessage(), null, $ex);
        }
    }

    private function handleErrors($xml)
    {
        $doc = new \DOMDocument('1.0', 'UTF-8');
        $doc->loadXML($xml);
        $nodeList = $doc->getElementsByTagName("Err1");

        if ($nodeList->length == 0) {
            return;
        }

        $error = $nodeList->item(0)->textContent;

        throw new ValidationException($error);
    }
}
