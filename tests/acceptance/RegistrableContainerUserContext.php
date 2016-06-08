<?php

namespace Bauhaus\Container;

require __DIR__ . '/../bootstrap.php';

class RegistrableContainerUserContext extends ContainerUserBaseContext
{
    /**
     * @When I register an item with label :label and value :value
     */
    public function iRegisterANewItemWithLabelAndValue($label, $value)
    {
        $this->container->register($label, $value);
    }

    /**
     * @When I try to register an item with label :label already taken
     */
    public function iTryToRegisterAnItemWithLabelAlreadyTaken($label)
    {
        try {
            $this->container->register($label, 'someValue');
        } catch (\Exception $e) {
            $this->outcome = $e;
        }
    }
}
