<?php
/**
 * Copyright (c) 2015 Shaun Hardy <party.hardy247@gmail.com>.
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace SMH\Enom\Transport;

use SMH\Enom\Exception\TransportException;

interface TransportInterface
{
    /**
     * Send a HTTP GET request
     *
     * @param $url
     * @param array $queryParameters
     * @return string
     * @throws TransportException
     */
    public function get($url, array $queryParameters);
}
