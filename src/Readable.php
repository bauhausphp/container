<?php

namespace Bauhaus\Container;

interface Readable
{
    public function has(string $label): bool;
    public function __get(string $label);
    public function all(): array;
}
