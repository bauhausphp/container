<?php

namespace Bauhaus\Container;

use \Bauhaus\Container\Exception\ContainerItemNotFoundException;
use \Bauhaus\Container\Exception\ContainerItemAlreadyExistsException;

abstract class BaseContainer
{
    private $items = [];

    final protected function _register(string $itemName, $itemValue)
    {
        $this->items[$itemName] = $itemValue;
    }

    final protected function _has(string $itemName): bool
    {
        return array_key_exists($itemName, $this->items);
    }

    final protected function _get(string $itemName)
    {
        if ($this->has($itemName) === false) {
            throw new ContainerItemNotFoundException($itemName);
        }

        return $this->items[$itemName];
    }
}
