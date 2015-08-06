<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Model;

use JMS\Serializer\Annotation as Serializer;

class DomainCollection implements \IteratorAggregate, \ArrayAccess, \Countable
{
    /**
     * @Serializer\SerializedName("DomainDetail")
     * @Serializer\Type("array<SMH\Enom\Model\DomainDetail>")
     * @Serializer\XmlList(inline=true, entry="DomainDetail")
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

    public function offsetExists($offset)
    {
        return isset($this->domains[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->domains[$offset]) ? $this->domains[$offset] : null;
    }

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->domains[] = $value;
        } else {
            $this->domains[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->domains[$offset]);
    }
}
