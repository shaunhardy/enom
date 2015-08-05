<?php
/**
 * Copyright (c) 2015 Shaun Hardy <party.hardy247@gmail.com>.
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace SMH\Enom\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * Response to the GetHosts command.
 *
 * @see http://www.enom.com/api/API%20topics/api_GetHosts.htm Documentation of the API command.
 */
class GetHostsResponse extends BaseResponse
{
    /**
     * @Serializer\SerializedName("host")
     * @Serializer\Type("array<SMH\Enom\Model\Host>")
     * @Serializer\XmlList(inline="true", entry="host")
     *
     * @var array
     */
    public $hosts;
}
