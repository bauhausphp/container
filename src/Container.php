<?php

namespace Bauhaus\Container;

use Interop\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }

    final public function has($label)
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

    final public function __get($label)
    {
        return $this->get($label);
    }

    public function all(): array
    {
        return $this->items;
    }

    final public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }
}
