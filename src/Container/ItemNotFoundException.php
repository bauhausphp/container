<?php

namespace Bauhaus\Container;

use Interop\Container\Exception\NotFoundException as IteropNotFoundException;

class ItemNotFoundException extends ItemException implements IteropNotFoundException
{
    protected function message(): string
    {
        return "No item labeled as '{$this->label()}' was found in container";
    }
}
