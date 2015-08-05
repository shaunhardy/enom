<?php
/**
 * Copyright 2015 Shaun Hardy <party.hardy247@gmail.com>.
 * All Rights Reserved.
 */

namespace SMH\Enom\Serializer;


use SMH\Enom\Exception\SerializationException;

interface SerializerInterface
{
    /**
     * @param $xml
     * @return \SMH\Enom\Response\BaseResponse
     * @throws SerializationException
     */
    public function deserialize($xml);
}
