<?php

namespace Bauhaus\Container;

class ContainerItemNotFoundException extends \Exception
{
    public function __construct($label)
    {
        parent::__construct("No item labeled as '$label' was found in this container");
    }
}
