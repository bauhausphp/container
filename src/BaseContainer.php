<?php

namespace Bauhaus\Container;

use \Bauhaus\Container\Exception\ContainerItemNotFound;
use \Bauhaus\Container\Exception\ContainerItemAlreadyExists;

abstract class BaseContainer
{
    private $items = [];

    final protected function _register(string $label, $value)
    {
        if ($this->has($label)) {
            throw new ContainerItemAlreadyExists($label);
        }

        $this->items[$label] = $value;
    }

    final protected function _has(string $label): bool
    {
        return array_key_exists($label, $this->items);
    }

    final protected function _get(string $label)
    {
        if (false === $this->has($label)) {
            throw new ContainerItemNotFound($label);
        }

        return $this->items[$label];
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
