<?php

namespace Bauhaus\Container;

use Bauhaus\Container;

class Factory
{
    public function containerWithItemAdded(Container $container, string $label, $value): Container
    {
        if ($container->has($label)) {
            throw new ItemAlreadyExistsException($label);
        }

        $items = $container->all();
        $items[$label] = $value;

        return new Container($items);
    }
}
