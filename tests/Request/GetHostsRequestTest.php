<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Tests\Request;

use SMH\Enom\Request\GetHostsRequest;

class GetHostsRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testDefault()
    {
        $request = new GetHostsRequest('example', 'com');

        $this->assertEquals([
            'Command' => 'GetHosts',
            'SLD' => 'example',
            'TLD' => 'com'
        ], $request->toArray());
    }
}
