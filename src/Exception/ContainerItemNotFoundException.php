<?php

namespace Bauhaus\Container\Exception;

class ContainerItemNotFoundException extends \Exception
{
    public function __construct($itemName)
    {
        parent::__construct("No item found with name '$itemName'");
    }
}
