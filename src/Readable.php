<?php

namespace Bauhaus\Container;

use Interop\Container\ContainerInterface;

interface Readable extends ContainerInterface
{
    public function has($label);
    public function get($label);
    public function __get($label);
    public function all(): array;
}
