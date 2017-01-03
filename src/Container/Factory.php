<?php

namespace Bauhaus\Container;

use Bauhaus\ContainerInterface;

class Factory
{
    public function containerWithItemAdded(
        ContainerInterface $container,
        string $label,
        $value
    ): ContainerInterface {
        if ($container->has($label)) {
            throw new ItemAlreadyExistsException($label);
        }

        $items = $container->items();
        $items[$label] = $value;

        return $this->createNewContainer($container, $items);
    }

    public function containerWithItemReplaced(
        ContainerInterface $container,
        string $label,
        $value
    ): ContainerInterface {
        if (false === $container->has($label)) {
            throw new ItemNotFoundException($label);
        }

        $items = $container->items();
        $items[$label] = $value;

        return $this->createNewContainer($container, $items);
    }

    public function containerWithoutItem(
        ContainerInterface $container,
        string $label
    ): ContainerInterface {
        if (false === $container->has($label)) {
            throw new ItemNotFoundException($label);
        }

        $items = $container->items();
        unset($items[$label]);

        return $this->createNewContainer($container, $items);
    }

    private function createNewContainer(
        ContainerInterface $container,
        array $items
    ): ContainerInterface {
        $completeClassName = get_class($container);

        return new $completeClassName($items);
    }
}
