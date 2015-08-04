<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Model;

use JMS\Serializer\Annotation as Serializer;

class Host
{
    /**
     * @Serializer\SerializedName("name")
     * @Serializer\Type("string")
     *
     * @var string
     */
    public $name;

    /**
     * @Serializer\SerializedName("type")
     * @Serializer\Type("string")
     *
     * @var string
     */
    public $type;

    /**
     * @Serializer\SerializedName("address")
     * @Serializer\Type("string")
     *
     * @var string
     */
    public $address;

    /**
     * @Serializer\SerializedName("hostid")
     * @Serializer\Type("string")
     *
     * @var string
     */
    public $hostid;
}
