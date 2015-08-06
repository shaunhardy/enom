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
        $this->setParameter('SLD', $sld);
        $this->setParameter('TLD', $tld);
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                'Command' => 'GetHosts'
            ])
            ->setRequired([
                'SLD',
                'TLD'
            ]);
    }
}
