<?php

namespace Bauhaus\Container;

abstract class RegistrableContainer extends ReadableContainer implements Registrable
{
    public function register(string $itemName, $itemValue)
    {
        $this->_register($itemName, $itemValue);
    }
}
