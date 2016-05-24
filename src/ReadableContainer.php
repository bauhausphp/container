<?php

namespace Bauhaus\Container;

abstract class ReadableContainer extends BaseContainer implements Readable
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
}
