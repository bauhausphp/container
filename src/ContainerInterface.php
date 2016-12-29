<?php

namespace Bauhaus;

use Interop\Container\ContainerInterface as IteropContainerInterface;

interface ContainerInterface extends IteropContainerInterface, \IteratorAggregate
{
    public function has($label);
    public function get($label);
    public function __get($label);
    public function all(): array;
}
