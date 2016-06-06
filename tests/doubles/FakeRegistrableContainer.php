<?php

namespace Bauhaus\Container;

class FakeRegistrableContainer extends RegistrableContainer
{
    public function __construct(array $items = [])
    {
        foreach ($items as $name => $value) {
            $this->register($name, $value);
        }
    }
}
