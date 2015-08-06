<?php
/**
 * Copyright (c) 2015 Shaun Hardy <party.hardy247@gmail.com>.
 *
 * This software may be modified and distributed under the terms
 * of the MIT license. See the LICENSE file for details.
 */

namespace SMH\Enom\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class BaseRequest implements RequestInterface
{
    private $parameters = array();

    public function setParameter($name, $value)
    {
        if ($value === null) {
            if (isset($this->parameters[$name])) {
                unset($this->parameters[$name]);
            }

            return $this;
        }

        $this->parameters[$name] = $value;

        return $this;
    }

    public function getParameter($name)
    {
        if (isset($this->parameters[$name])) {
            return $this->parameters[$name];
        }

        return null;
    }

    abstract protected function configureOptions(OptionsResolver $resolver);

    public function toArray()
    {
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        return $resolver->resolve($this->parameters);
    }
}
