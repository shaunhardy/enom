<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Response;

use JMS\Serializer\Annotation as Serializer;
use SMH\Enom\Model\DomainCollection;

class GetAllDomainsResponse extends BaseResponse
{
    /**
     * @Serializer\SerializedName("GetAllDomains")
     * @Serializer\Type("SMH\Enom\Model\DomainCollection")
     *
     * @var DomainCollection
     */
    public $getAllDomains;
}
