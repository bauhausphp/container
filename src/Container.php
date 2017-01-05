<?php

namespace Bauhaus;

use Bauhaus\Container\ItemNotFoundException;

class Container implements ContainerInterface
{
    private $items = [];

    public function __construct(array $items = [])
    {
        foreach ($items as $label => $item) {
            if (false === $this->canContain($item)) {
                throw new \InvalidArgumentException(
                    $this->itemCanNotBeContainedExceptionMessage($label)
                );
            }
        }

        $this->items = $items;
    }

    public function has($label)
    {
        return array_key_exists($label, $this->items);
    }

    public function get($label)
    {
        if (false === $this->has($label)) {
            throw new ItemNotFoundException($label);
        }

        return $this->items[$label];
    }

    final public function __get($label)
    {
        return $this->get($label);
    }

    final public function items(): array
    {
        return $this->items;
    }

    public function asArray(): array
    {
        throw new \RuntimeException('Method asArray not implemented');
    }

    /**
     * This method is used on contructor to check if each given item can be
     * contained in the container. When this method returns 'false', then an
     * invalid argument exception is throwed.
     *
     * Its default implemantation always returns 'true', but the child classes
     * can re-implement it to keep the container consistency.
     */
    protected function canContain($item): bool
    {
        return true;
    }

    /**
     * The string returned by this method is used to create the invalid argument
     * exception throwed when a given item can not be contained in container.
     */
    protected function itemCanNotBeContainedExceptionMessage(string $label): string
    {
        return "The item '$label' can not be contained in this container";
    }
}
