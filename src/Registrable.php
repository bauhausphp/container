<?php

namespace Bauhaus\Container;

interface Registrable
{
    public function register(string $label, $value);
}
