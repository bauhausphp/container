<?php

namespace Bauhaus\Container;

class Container implements Readable, \IteratorAggregate
{
    private $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function has($label)
    {
        return array_key_exists($label, $this->items);
    }

    public function get($label)
    {
        if (false === $this->has($label)) {
            throw new ContainerItemNotFoundException($label);
        }

        return $this->items[$label];
    }

    public function __get($label)
    {
        return $this->get($label);
    }

    public function all(): array
    {
        return $this->items;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }
}
