<?php

namespace Bauhaus\Container;

require __DIR__ . '/../bootstrap.php';

class ReadableContainerUserContext extends ContainerUserBaseContext
{
    /**
     * @Transform /true|false/
     */
    public function castStringToBoolean($string)
    {
        if ('true' == $string) {
            return true;
        }

        return false;
    }

    /**
     * @When I verify if the item :label exists
     */
    public function iVerifyIfTheItemExists($label)
    {
        $this->outcome = $this->container->has($label);
    }

    /**
     * @When I require all items
     */
    public function iRequireAllItems()
    {
        $this->outcome = $this->container->all();
    }

    /**
     * @When I iterate the given container
     */
    public function iIterateTheGivenContainer()
    {
        $this->outcome = [];
        foreach ($this->container as $label => $value) {
            $this->outcome[$label] = $value;
        }
    }

    /**
     * @When I require the value of the item :label that does not exists
     */
    public function iRequireTheValueOfTheItemThatDoesNotExists($label)
    {
        try {
            $this->outcome = $this->container->$label;
        } catch (\Exception $e) {
            $this->outcome = $e;
        }
    }

    /**
     * @Then I should receive an array with the following items:
     */
    public function iShouldReceiveAnArrayWithTheFollowData(array $expectedItems)
    {
        assertEquals($expectedItems, $this->outcome);
    }
}
