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

        return $this->createContainer($container, $items);
    }

    protected function createContainer(
        ContainerInterface $container,
        array $items
    ): ContainerInterface {
        $completeClassName = get_class($container);

        return new $completeClassName($items);
    }
}
