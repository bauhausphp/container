<?php

namespace Bauhaus\Container\Exception;

class ContainerItemAlreadyExists extends \Exception
{
    public function __construct($label)
    {
        parent::__construct("There is already an item with label '$label' in this container");
    }
}
