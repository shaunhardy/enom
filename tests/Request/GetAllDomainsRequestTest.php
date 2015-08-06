<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Tests\Request;

use SMH\Enom\Request\GetAllDomainsRequest;

class GetAllDomainsRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $request = new GetAllDomainsRequest();
        $this->assertEquals([
            'Command' => 'GetAllDomains',
        ], $request->toArray());
    }

    public function testEnomNameservers()
    {
        $request = new GetAllDomainsRequest();
        $request->whichUseEnomNameservers();

        $this->assertEquals([
            'Command' => 'GetAllDomains',
            'UseEnomNS' => 'Yes'
        ], $request->toArray());
    }

    public function testCustomNameservers()
    {
        $request = new GetAllDomainsRequest();
        $request->whichUseCustomNameservers();

        $this->assertEquals([
            'Command' => 'GetAllDomains',
            'UseDNS' => 'custom'
        ], $request->toArray());
    }

    public function testDefaultNameservers()
    {
        $request = new GetAllDomainsRequest();
        $request->whichUseDefaultNameservers();

        $this->assertEquals([
            'Command' => 'GetAllDomains',
            'GetDefaultOnly' => '1'
        ], $request->toArray());
    }

    public function testLetter()
    {
        $request = new GetAllDomainsRequest();
        $request->whichBeginWithCharacter('w');

        $this->assertEquals([
            'Command' => 'GetAllDomains',
            'Letter' => 'w'
        ], $request->toArray());
    }

    public function testIsLocked()
    {
        $request = new GetAllDomainsRequest();
        $request->whichAreLocked();

        $this->assertEquals([
            'Command' => 'GetAllDomains',
            'RegistrarLock' => 'Locked'
        ], $request->toArray());
    }

    public function testIsNotLocked()
    {
        $request = new GetAllDomainsRequest();
        $request->whichAreUnlocked();

        $this->assertEquals([
            'Command' => 'GetAllDomains',
            'RegistrarLock' => 'Not Locked'
        ], $request->toArray());
    }

    public function testIsAutoRenew()
    {
        $request = new GetAllDomainsRequest();
        $request->whichWillAutoRenew();

        $this->assertEquals([
            'Command' => 'GetAllDomains',
            'AutoRenew' => 'Yes'
        ], $request->toArray());
    }

    public function testIsNotAutoRenew()
    {
        $request = new GetAllDomainsRequest();
        $request->whichWillNotAutoRenew();

        $this->assertEquals([
            'Command' => 'GetAllDomains',
            'AutoRenew' => 'No'
        ], $request->toArray());
    }

    public function testContact()
    {
        $request = new GetAllDomainsRequest();
        $request->withContact('John Doe', GetAllDomainsRequest::CONTACT_REGISTRANT);

        $this->assertEquals([
            'Command' => 'GetAllDomains',
            'Name' => 'John Doe',
            'ContactType' => 'Registrant'
        ], $request->toArray());
    }

    public function testNameserver()
    {
        $request = new GetAllDomainsRequest();
        $request->whichUseNameserver('ns1.nameserver.com');

        $this->assertEquals([
            'Command' => 'GetAllDomains',
            'NameServer' => 'ns1.nameserver.com'
        ], $request->toArray());
    }
}
