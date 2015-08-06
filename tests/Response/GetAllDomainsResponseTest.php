<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Tests\Response;

use JMS\Serializer\SerializerBuilder;

class GetAllDomainsResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testDeserialization()
    {
        $serializer = SerializerBuilder::create()->build();
        $serialized = file_get_contents(__DIR__.'/../mock/GetAllDomainsResponse.xml');

        $responseObj = $serializer->deserialize($serialized, 'SMH\\Enom\\Response\\BaseResponse', 'xml');

        $this->assertInstanceOf('SMH\\Enom\\Response\\GetAllDomainsResponse', $responseObj);

        $collection = $responseObj->getAllDomains;

        $this->assertCount(2, $collection);

        $domain1 = $collection[0];
        $this->assertEquals('sesame.com', $domain1->domainName);
        $this->assertEquals('0000000001', $domain1->domainNameId);
        $this->assertInstanceOf('\\DateTime', $domain1->expiration);
        $this->assertEquals('2016-01-28T22:19:26+00:00', $domain1->expiration->format(\DateTime::ATOM));
        $this->assertEquals('Locked', $domain1->lockStatus);
        $this->assertEquals('No', $domain1->autoRenew);
        $this->assertTrue($domain1->isLocked());
        $this->assertFalse($domain1->isAutoRenew());

        $domain2 = $collection[1];
        $this->assertEquals('sesameexample.com', $domain2->domainName);
        $this->assertEquals('0000000002', $domain2->domainNameId);
        $this->assertInstanceOf('\\DateTime', $domain2->expiration);
        $this->assertEquals('2016-03-11T16:10:07+00:00', $domain2->expiration->format(\DateTime::ATOM));
        $this->assertEquals('Not Locked', $domain2->lockStatus);
        $this->assertEquals('Yes', $domain2->autoRenew);
        $this->assertFalse($domain2->isLocked());
        $this->assertTrue($domain2->isAutoRenew());
    }
}
