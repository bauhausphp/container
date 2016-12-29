<?php

namespace Bauhaus\Container;

class ItemAlreadyExistsException extends ItemException
{
    protected function message(): string
    {
        return "There is already an item registered with label '{$this->label()}'";
    }
}
