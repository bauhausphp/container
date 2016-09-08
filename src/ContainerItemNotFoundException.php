<?php

namespace Bauhaus\Container;

class ContainerItemNotFoundException extends ContainerItemException
{
    protected function messageTemplate(): string
    {
        return "No item labeled as '%s' was found in this container";
    }
}
