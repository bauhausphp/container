<?php

namespace Bauhaus\Container;

abstract class ReadableContainer extends BaseContainer implements Readable, Iterator
{
    public function has(string $label): bool
    {
        return $this->_has($label);
    }

    public function __get(string $label)
    {
        return $this->_get($label);
    }

    public function all(): array
    {
        return $this->_all();
    }

    public function current()
    {
        return $this->_iteratorCurrent();
    }

    public function key()
    {
        return $this->_iteratorKey();
    }

    public function next()
    {
        return $this->_iteratorNext();
    }

    public function rewind()
    {
        $this->_iteratorRewind();
    }

    public function valid()
    {
        return $this->_iteratorValid();
    }
}
