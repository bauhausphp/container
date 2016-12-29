<?php

namespace Bauhaus\Container;

use Interop\Container\Exception\ContainerException as IteropContainerException;

abstract class ItemException extends \Exception implements IteropContainerException
{
    public function __construct(string $label)
    {
        parent::__construct(sprintf($this->messageTemplate(), $label));
    }

    abstract protected function messageTemplate(): string;
}
