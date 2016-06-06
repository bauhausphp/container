<?php

namespace Bauhaus\Container\Exception;

class ContainerItemNotFound extends \Exception
{
    public function __construct($label)
    {
        parent::__construct("No item labeled as '$label' was found in container");
    }
}
