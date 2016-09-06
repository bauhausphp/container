<?php

namespace Bauhaus\Container;

class Container implements Readable, \IteratorAggregate
{
    private $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    public function has(string $label): bool
    {
        return array_key_exists($label, $this->items);
    }

    public function __get(string $label)
    {
        if (false === $this->has($label)) {
            throw new ContainerItemNotFoundException($label);
        }

        return $this->items[$label];
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
