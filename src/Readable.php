<?php

namespace Bauhaus\Container;

interface Readable
{
    public function has(string $itemName): bool;
    public function get(string $itemName);
    public function __get(string $itemName);
}
