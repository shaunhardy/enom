<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Model;

use JMS\Serializer\Annotation as Serializer;

class DomainCollection implements \IteratorAggregate, \Countable
{
    /**
     * @Serializer\SerializedName("DomainDetail")
     * @Serializer\Type("array<SMH\Enom\Model\DomainDetail>")
     * @Serializer\XmlList(inline="true", entry="DomainDetail")
     *
     * @var array
     */
    public $domains;

    /**
     * @Serializer\SerializedName("domaincount")
     * @Serializer\Type("integer")
     *
     * @var int
     */
    public $count;

    /**
     * @Serializer\SerializedName("UserRequestStatus")
     * @Serializer\Type("string")
     *
     * @var string
     */
    public $requestStatus;

    public function getIterator()
    {
        return new \ArrayIterator($this->domains);
    }

    public function count()
    {
        return count($this->domains);
    }
}
