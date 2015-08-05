<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Response;

use JMS\Serializer\Annotation as Serializer;

class SetHostsResponse extends BaseResponse
{
    /**
     * @Serializer\SerializedName("DomainRRP")
     * @Serializer\Type("string")
     *
     * @var string
     */
    public $domainRRP;
}
