<?php

namespace Bauhaus\Container;

use Interop\Container\Exception\ContainerException as IteropContainerException;

abstract class ItemException extends \Exception implements IteropContainerException
{
    private $label = null;

    public function __construct(string $label)
    {
        $this->label = $label;

        parent::__construct($this->message());
    }

    final public function label(): string
    {
        return $this->label;
    }

    abstract protected function message(): string;
}
