<?php

namespace Bauhaus\Container;

use Interop\Container\Exception\ContainerException;

abstract class ContainerItemException extends \Exception implements ContainerException
{
    public function __construct(string $label)
    {
        parent::__construct(sprintf($this->messageTemplate(), $label));
    }

    abstract protected function messageTemplate(): string;
}
