<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Serializer;

use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use SMH\Enom\Exception\SerializationException;
use SMH\Enom\Response\BaseResponse;

class JMSSerializer implements SerializerInterface
{
    /** @var \JMS\Serializer\SerializerInterface */
    private $serializer;

    public function __construct()
    {
        $this->initialize();
    }

    private function initialize()
    {
        $this->serializer = SerializerBuilder::create()->build();
    }

    /**
     * Deserialize XML into a BaseResponse
     *
     * @param $xml
     * @return BaseResponse
     * @throws SerializationException
     */
    public function deserialize($xml)
    {
        try {
            return $this->serializer->deserialize($xml, 'SMH\\Enom\\Response\\BaseResponse', 'xml');
        } catch (\RuntimeException $ex) {
            throw new SerializationException($ex->getMessage(), null, $ex);
        }
    }
}
