<?php

namespace Bauhaus;

use Bauhaus\Container;

class StringContainer extends Container
{
    protected function canContain($item): bool
    {
        return is_string($item);
    }
}
