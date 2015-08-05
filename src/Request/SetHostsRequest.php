<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Request;

class SetHostsRequest extends BaseRequest
{
    private $counter = 0;

    public function __construct($sld, $tld)
    {
        $this->setParameter('sld', $sld);
        $this->setParameter('tld', $tld);
    }

    public function addRecord($hostname, $type, $address, $mxPref = null)
    {
        $this->counter++;

        $this->setParameter('HostName' . $this->counter, $hostname);
        $this->setParameter('RecordType' . $this->counter, $type);
        $this->setParameter('Address' . $this->counter, $address);
        $this->setParameter('MXPref' . $this->counter, $mxPref);
    }
}
