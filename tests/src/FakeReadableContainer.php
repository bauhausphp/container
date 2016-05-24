<?php

namespace Bauhaus\Container;

class FakeReadableContainer extends ReadableContainer
{
    public function __construct(array $items)
    {
        foreach ($items as $name => $value) {
            $this->_register($name, $value);
        }
    }
}
