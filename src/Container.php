<?php

namespace Bauhaus;

use Bauhaus\Container\ItemNotFoundException;

class Container implements ContainerInterface
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
            throw new ItemNotFoundException($label);
        }

        return $this->items[$label];
    }

    final public function __get($label)
    {
        return $this->get($label);
    }

    final public function items(): array
    {
        return $this->items;
    }

    public function asArray(): array
    {
        throw new \RuntimeException('Method asArray not implemented');
    }
}
