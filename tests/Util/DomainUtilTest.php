<?php
/**
 * Copyright (c) 2015 Shaun Hardy <party.hardy247@gmail.com>.
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace SMH\Enom\Tests\Util;

use SMH\Enom\Util\DomainUtil;

class DomainUtilTest extends \PHPUnit_Framework_TestCase
{
    public function testValidate()
    {
        $domainUtil = new DomainUtil();
        // Two level domains are allowed
        $this->assertTrue($domainUtil->validate('example.com'));

        // Three level domains are allowed
        $this->assertTrue($domainUtil->validate('example.us.com'));

        // Any number of levels greater that one are allowed
        $this->assertTrue($domainUtil->validate('www.example.com.au'));

        // Digits are allowed
        $this->assertTrue($domainUtil->validate('1example.com'));

        // Hyphens are allowed
        $this->assertTrue($domainUtil->validate('an-example.com'));

        // Single-character subdomains are allowed
        $this->assertTrue($domainUtil->validate('a.example.com'));

        // URL protocol is not allowed.
        $this->assertFalse($domainUtil->validate('http://example.com'));

        // URL path is not allowed
        $this->assertFalse($domainUtil->validate('example.com/index'));

        // Single-character TLDs are not allowed
        $this->assertFalse($domainUtil->validate('example.c'));

        // A label cannot start with a hyphen
        $this->assertFalse($domainUtil->validate('-example.com'));

        // A label cannot end with a hyphen
        $this->assertFalse($domainUtil->validate('example-.com'));

        // TLD cannot be empty
        $this->assertFalse($domainUtil->validate('example.'));

        // A Second level domain is required
        $this->assertFalse($domainUtil->validate('com'));
    }

    public function testSplit()
    {
        $domainUtil = new DomainUtil();
        $this->assertEquals(
            ['com', 'example'],
            $domainUtil->split('example.com')
        );

        $this->assertEquals(
            ['com', 'us', 'example'],
            $domainUtil->split('example.us.com')
        );

        $this->assertEquals(
            ['com', 'us', 'example', 'www'],
            $domainUtil->split('www.example.us.com')
        );
    }

    public function testSplitWithTLDs()
    {
        $tlds = ['us.com', 'com.au', 'com'];
        $domainUtil = new DomainUtil();

        $this->assertEquals(
            ['com', 'example'],
            $domainUtil->split('example.com', $tlds)
        );

        $this->assertEquals(
            ['us.com', 'example'],
            $domainUtil->split('example.us.com', $tlds)
        );

        $this->assertEquals(
            ['us.com', 'example', 'www'],
            $domainUtil->split('www.example.us.com', $tlds)
        );

        $this->assertEquals(
            ['com.au', 'example', 'www'],
            $domainUtil->split('www.example.com.au', $tlds)
        );

        // If TLD is not found in list, use the top most domain by default.
        $this->assertEquals(
            ['net', 'example', 'www'],
            $domainUtil->split('www.example.net', $tlds)
        );
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSplitInvalidDomain()
    {
        $domainUtil = new DomainUtil();
        $domainUtil->split('example-.com');
    }
}
