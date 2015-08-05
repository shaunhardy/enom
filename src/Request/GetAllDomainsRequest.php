<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Request;


class GetAllDomainsRequest extends BaseRequest
{
    const CONTACT_REGISTRANT = 'Registrant';
    const CONTACT_AUX_BILLING = 'Aux Billing';
    const CONTACT_TECHNICAL = 'Technical';
    const CONTACT_ADMINISTRATIVE = 'Administrative';

    public function whichUseNameserver($nameserver)
    {
        $this->setParameter('Nameserver', $nameserver);

        return $this;
    }

    public function whichUseDefaultNameservers()
    {
        $this->setParameter('GetDefaultOnly', '1');

        return $this;
    }

    public function whichUseCustomNameservers()
    {
        $this->setParameter('UseDNS', 'Custom');

        return $this;
    }

    public function whichUseEnomNameservers()
    {
        $this->setParameter('UseEnomNS', 'Yes');

        return $this;
    }

    public function whichBeginWithCharacter($character)
    {
        if (!preg_match('/^[a-z0-9]$/i', $character)) {
            throw new \InvalidArgumentException(sprintf('The parameter $character expected a single alphanumeric character; "%s" was given.'));
        }

        $this->setParameter('Letter', $character);

        return $this;
    }

    public function whichAreLocked()
    {
        $this->setParameter('RegistrarLock', 'Locked');

        return $this;
    }

    public function whichAreUnlocked()
    {
        $this->setParameter('RegistrarLock', 'Not Locked');

        return $this;
    }

    public function whichWillAutoRenew()
    {
        $this->setParameter('AutoRenew', 'Yes');

        return $this;
    }

    public function whichWillNotAutoRenew()
    {
        $this->setParameter('AutoRenew', 'No');

        return $this;
    }

    public function withContact($name, $type)
    {
        $this->setParameter('Name', $name);
        $this->setParameter('ContactType', $type);

        return $this;
    }


}
