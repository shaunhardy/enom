<?php
/**
 * Copyright (c) 2015 Shaun Hardy <party.hardy247@gmail.com>.
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace SMH\Enom\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

class GetHostsRequest extends BaseRequest
{
    public function __construct($sld, $tld)
    {
        $this->setParameter('sld', $sld);
        $this->setParameter('tld', $tld);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'Command' => 'GetHost'
            ])
            ->setRequired([
                'sld',
                'tld'
            ]);
    }
}
