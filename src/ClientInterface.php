<?php
/**
 * Copyright (c) 2015 Shaun Hardy <party.hardy247@gmail.com>.
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace SMH\Enom;

use SMH\Enom\Request\RequestInterface;
use SMH\Enom\Response\BaseResponse;

interface ClientInterface
{
    /**
     * Send a request to eNom.
     *
     * @param RequestInterface $request
     * @return BaseResponse
     */
    public function sendRequest(RequestInterface $request);
}
