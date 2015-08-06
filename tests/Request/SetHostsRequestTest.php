<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Tests\Request;

use SMH\Enom\Request\SetHostsRequest;

class SetHostsRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $request = new SetHostsRequest('example', 'com');
        $request
            ->addRecord('@', 'A', '12.34.56.78')
            ->addRecord('www', 'CNAME', 'example.com.')
            ->addRecord('mail', 'CNAME', 'example.com.')
            ->addRecord('@', 'MX', 'mail.example.com.', 10);

        $this->assertEquals([
            'Command' => 'SetHosts',
            'SLD' => 'example',
            'TLD' => 'com',
            'HostName1' => '@',
            'RecordType1' => 'A',
            'Address1' => '12.34.56.78',
            'HostName2' => 'www',
            'RecordType2' => 'CNAME',
            'Address2' => 'example.com.',
            'HostName3' => 'mail',
            'RecordType3' => 'CNAME',
            'Address3' => 'example.com.',
            'HostName4' => '@',
            'RecordType4' => 'MX',
            'Address4' => 'mail.example.com.',
            'MXPref4' => 10
        ], $request->toArray());
    }
}
