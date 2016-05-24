<?php

namespace Bauhaus\Container;

use \Bauhaus\Container\Exception\ContainerItemNotFoundException;
use \Bauhaus\Container\Exception\ContainerItemAlreadyExistsException;

abstract class BaseContainer
{
    private $container = [];

    final protected function _register(string $itemName, $itemValue)
    {
        $this->container[$itemName] = $itemValue;
    }

    final protected function _has(string $itemName): bool
    {
        return array_key_exists($itemName, $this->container);
    }

    final protected function _get(string $itemName)
    {
        if ($this->has($itemName) === false) {
            throw new ContainerItemNotFoundException($itemName);
        }

        return $this->container[$itemName];
    }
}
