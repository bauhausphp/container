<?php

namespace Bauhaus\Container;

use Bauhaus\ContainerInterface;

class Factory
{
    private $container = null;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function containerWithItemAdded(string $label, $value): ContainerInterface
    {
        if ($this->container->has($label)) {
            throw new ItemAlreadyExistsException($label);
        }

        $items = $this->container->items();
        $items[$label] = $value;

        return $this->createNewContainer($items);
    }

    public function containerWithItemReplaced(string $label, $value): ContainerInterface
    {
        if (false === $this->container->has($label)) {
            throw new ItemNotFoundException($label);
        }

        $items = $this->container->items();
        $items[$label] = $value;

        return $this->createNewContainer($items);
    }

    public function containerWithoutItem(string $label): ContainerInterface
    {
        if (false === $this->container->has($label)) {
            throw new ItemNotFoundException($label);
        }

        $items = $this->container->items();
        unset($items[$label]);

        return $this->createNewContainer($items);
    }

    private function createNewContainer(array $items): ContainerInterface
    {
        $containerClassName = get_class($this->container);

        return new $containerClassName($items);
    }
}
