<?php
/**
 * Copyright (c) 2015 Shaun Hardy <party.hardy247@gmail.com>.
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace SMH\Enom\Util;


class DomainUtil
{
    const REGEX_FQDN = '/^([a-z0-9]([a-z0-9\-]*[a-z0-9])?\.)+[a-z0-9][a-z0-9\-]*[a-z0-9]$/i';

    /**
     * Validates if a string is a domain name.
     *
     * @param $domain
     * @return bool
     */
    public function validate($domain)
    {
        return 1 === preg_match(static::REGEX_FQDN, $domain);
    }

    /**
     * Split a domain into its levels, ordered from TLD to lower levels.
     *
     * @param $domain
     * @param array $tlds
     * @return array
     */
    public function split($domain, array $tlds = array())
    {
        if (!$this->validate($domain)) {
            throw new \InvalidArgumentException('The parameter $domain is not a valid domain name.');
        }

        $domain = strtolower($domain);

        $parts = array();
        $parts[] = substr($domain, 0, strpos($domain, '.'));
        $domain = substr($domain, strpos($domain, '.') + 1);

        while (!in_array($domain, $parts)) {
            if (false === $dot = strpos($domain, '.')) {
                break;
            }

            if (in_array($domain, $tlds)) {
                break;
            }

            $parts[] = substr($domain, 0, $dot);
            $domain = substr($domain, $dot + 1);
        }

        $parts[] = $domain;

        return array_reverse($parts);
    }
}
