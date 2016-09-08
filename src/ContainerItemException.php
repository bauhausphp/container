<?php

namespace Bauhaus\Container;

abstract class ContainerItemException extends \Exception
{
    public function __construct($label)
    {
        parent::__construct(sprintf($this->messageTemplate(), $label));
    }

    abstract protected function messageTemplate(): string;
}
