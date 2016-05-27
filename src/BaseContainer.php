<?php

namespace Bauhaus\Container;

use \Bauhaus\Container\Exception\ContainerItemNotFoundException;
use \Bauhaus\Container\Exception\ContainerItemAlreadyExistsException;

abstract class BaseContainer
{
    private $items = [];

    final protected function _register(string $itemName, $itemValue)
    {
        if ($this->has($itemName)) {
            throw new ContainerItemAlreadyExistsException($itemName);
        }

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

    final protected function _all(): array
    {
        return $this->items;
    }

    final protected function _iteratorCurrent()
    {
        return $this->_get($this->_iteratorKey());
    }

    final protected function _iteratorKey()
    {
        return key($this->items);
    }

    final protected function _iteratorNext()
    {
        return next($this->items);
    }

    final protected function _iteratorRewind()
    {
        reset($this->items);
    }

    final protected function _iteratorValid()
    {
        return key($this->items) !== null;
    }
}
