<?php

namespace Bauhaus\Container;

interface Registrable
{
    public function register(string $itemName, $itemValue);
}
