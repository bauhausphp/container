<?php

namespace Bauhaus\Container;

use Interop\Container\Exception\NotFoundException;

class ContainerItemNotFoundException extends ContainerItemException implements NotFoundException
{
    protected function messageTemplate(): string
    {
        return "No item labeled as '%s' was found in this container";
    }
}
