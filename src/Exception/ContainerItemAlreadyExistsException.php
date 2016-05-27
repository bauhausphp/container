<?php

namespace Bauhaus\Container\Exception;

class ContainerItemAlreadyExistsException extends \Exception
{
    public function __construct($itemName)
    {
        parent::__construct("There is already an item with name '$itemName'");
    }
}
