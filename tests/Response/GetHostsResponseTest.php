<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Tests\Response;

use JMS\Serializer\SerializerBuilder;

class GetHostsResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testDeserialization()
    {
        $serializer = SerializerBuilder::create()->build();
        $serialized = file_get_contents(__DIR__.'/../mock/GetHostsResponse.xml');

        $responseObj = $serializer->deserialize($serialized, 'SMH\\Enom\\Response\\BaseResponse', 'xml');

        $this->assertInstanceOf('SMH\\Enom\\Response\\GetHostsResponse', $responseObj);
        $this->assertCount(2, $responseObj->hosts);

        $host1 = $responseObj->hosts[0];
        $this->assertEquals('@', $host1->name);
        $this->assertEquals('A', $host1->type);
        $this->assertEquals('12.34.56.78', $host1->address);
        $this->assertEquals('20243281', $host1->hostId);

        $host2 = $responseObj->hosts[1];
        $this->assertEquals('www', $host2->name);
        $this->assertEquals('CNAME', $host2->type);
        $this->assertEquals('sesame.com.', $host2->address);
        $this->assertEquals('20243282', $host2->hostId);
    }
}
