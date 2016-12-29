<?php

namespace Bauhaus\Container;

use Interop\Container\IteropContainerInterface;

interface ContainerInterface extends IteropContainerInterface, \IteratorAggregate
{
    public function has($label);
    public function get($label);
    public function __get($label);
    public function all(): array;
}
