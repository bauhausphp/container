<?php

namespace Bauhaus\Container;

abstract class RegistrableContainer extends ReadableContainer implements Registrable
{
    public function register(string $label, $value)
    {
        $this->_register($label, $value);
    }
}
