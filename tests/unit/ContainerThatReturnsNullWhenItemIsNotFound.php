<?php

namespace Bauhaus;

use Bauhaus\Container;

class ContainerThatReturnsNullWhenItemIsNotFound extends Container
{
    protected function itemNotFoundHandler(string $label)
    {
        return null;
    }
}
