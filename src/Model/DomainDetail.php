<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Model;

use JMS\Serializer\Annotation as Serializer;

class DomainDetail
{
    /**
     * @Serializer\SerializedName("DomainName")
     * @Serializer\Type("string")
     *
     * @var string
     */
    public $domainName;

    /**
     * @Serializer\SerializedName("DomainNameID")
     * @Serializer\Type("integer")
     *
     * @var int
     */
    public $domainNameId;

    /**
     * @Serializer\SerializedName("expiration-date")
     * @Serializer\Type("DateTime<'n/j/Y g:i:s A'>")
     *
     * @var \DateTime
     */
    public $expiration;

    /**
     * @Serializer\SerializedName("lockstatus")
     * @Serializer\Type("string")
     *
     * @var string
     */
    public $lockStatus;

    /**
     * @Serializer\SerializedName("AutoRenew")
     * @Serializer\Type("string")
     *
     * @var string
     */
    public $autoRenew;

    public function isLocked()
    {
        return $this->lockStatus == 'Locked';
    }

    public function isAutoRenew()
    {
        return $this->autoRenew == 'Yes';
    }
}
