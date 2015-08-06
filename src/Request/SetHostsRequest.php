<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

class SetHostsRequest extends BaseRequest
{
    private $counter = 0;

    public function __construct($sld, $tld)
    {
        $this->setParameter('SLD', $sld);
        $this->setParameter('TLD', $tld);
    }

    public function addRecord($hostname, $type, $address, $mxPref = null)
    {
        $this->counter++;

        $this->setParameter('HostName' . $this->counter, $hostname);
        $this->setParameter('RecordType' . $this->counter, $type);
        $this->setParameter('Address' . $this->counter, $address);
        $this->setParameter('MXPref' . $this->counter, $mxPref);

        return $this;
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'Command' => 'SetHosts'
            ])
            ->setRequired([
                'SLD',
                'TLD'
            ]);

        $defined = [];
        for ($i = $this->counter; $i > 0; $i--) {
            $defined[] = 'HostName' . $i;
            $defined[] = 'RecordType' . $i;
            $defined[] = 'Address' . $i;
            $defined[] = 'MXPref' . $i;
        }

        $resolver->setDefined($defined);
    }
}
