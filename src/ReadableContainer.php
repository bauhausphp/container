<?php

namespace Bauhaus\Container;

abstract class ReadableContainer extends BaseContainer implements Readable, Iterator
{
    public function has(string $itemName): bool
    {
        return $this->_has($itemName);
    }

    public function get(string $itemName)
    {
        return $this->_get($itemName);
    }

    public function __get(string $itemName)
    {
        return $this->get($itemName);
    }

    public function all(): array
    {
        return $this->_all();
    }
}
