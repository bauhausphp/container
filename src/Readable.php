<?php

namespace Bauhaus\Container;

interface Readable
{
    public function has(string $itemName): bool;
    public function __get(string $itemName);
}
