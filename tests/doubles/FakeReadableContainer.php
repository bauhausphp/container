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

    public function register(string $label, $value)
    {
        $this->_register($label, $value);
    }
}
