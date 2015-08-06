<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Tests\Response;

use JMS\Serializer\SerializerBuilder;

class SetHostsResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testDeserialization()
    {
        $serializer = SerializerBuilder::create()->build();
        $serialized = file_get_contents(__DIR__.'/../mock/SetHostsResponse.xml');

        $responseObj = $serializer->deserialize($serialized, 'SMH\\Enom\\Response\\BaseResponse', 'xml');

        $this->assertInstanceOf('SMH\\Enom\\Response\\SetHostsResponse', $responseObj);
    }
}
