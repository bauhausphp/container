<?php

namespace Bauhaus\Container;

use Interop\Container\Exception\NotFoundException as IteropNotFoundException;

class ItemNotFoundException extends ItemException implements IteropNotFoundException
{
    protected function messageTemplate(): string
    {
        return "No item labeled as '%s' was found in this container";
    }
}
