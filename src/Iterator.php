<?php

namespace Bauhaus\Container;

interface Iterator extends \Iterator
{
    public function all(): array;
}
