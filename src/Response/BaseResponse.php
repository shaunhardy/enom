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
 * The Base Response from which all other responses are derived.
 *
 * @Serializer\Discriminator(field="Command", map={
 *   "GETHOSTS" : "SMH\Enom\Response\GetHostsResponse",
 *   "SETHOSTS" : "SMH\Enom\Response\SetHostsResponse",
 *   "GETALLDOMAINS" : "SMH\Enom\Response\GetAllDomainsResponse"
 * })
 */
abstract class BaseResponse
{
}
