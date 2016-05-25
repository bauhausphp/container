<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use Bauhaus\Container\FakeReadableContainer;

require __DIR__ . '/../../bootstrap.php';

class FeatureContext implements Context, SnippetAcceptingContext
{
    private $container = null;
    private $outcome = null;

    /**
     * @Transform /true|false/
     */
    public function castStringToBoolean($string)
    {
        if ($string == 'true') {
            return true;
        }

        return false;
    }

    /**
     * @Given a readable container with the follow items:
     */
    public function aReadableContainerWithTheFollowItems(TableNode $itemsData)
    {
        $items = [];
        foreach ($itemsData as $data) {
            $items[$data['name']] = $data['value'];
        }

        $this->container = new FakeReadableContainer($items);
    }

    /**
     * @When I verify if the container has the item :itemName
     */
    public function iVerifyIfTheContainerHasTheItem($itemName)
    {
        $this->outcome = $this->container->has($itemName);
    }

    /**
     * @When I request the container for the value of the item :itemName
     */
    public function iRequestTheContainerForTheValueOfTheItem($itemName)
    {
        try {
            $this->outcome = $this->container->get($itemName);
        } catch (\Exception $e) {
            $this->outcome = $e;
        }
    }

    /**
     * @When I request magically the container for the value of the item :itemName
     */
    public function iRequestMagicallyTheContainerForTheValueOfTheItem($itemName)
    {
        try {
            $this->outcome = $this->container->{$itemName};
        } catch (\Exception $e) {
            $this->outcome = $e;
        }
    }

    /**
     * @Then I should receive :expected
     */
    public function iShouldReceive($expected)
    {
        assertEquals($expected, $this->outcome);
    }

    /**
     * @Then I should receive the exception :exceptionClassName
     */
    public function iShouldReceiveTheException($exceptionClassName)
    {
        assertInstanceOf(
            "Bauhaus\\Container\\Exception\\$exceptionClassName",
            $this->outcome
        );
    }

    /**
     * @When I request the container for all items
     */
    public function iRequestTheContainerForAllItems()
    {
        $this->outcome = $this->container->all();
    }

    /**
     * @When I use the container as iterator in a foreach statment
     */
    public function iUseTheContainerAsIteratorInAForeachStatment()
    {
        $this->outcome = [];
        foreach ($this->container as $itemName => $itemValue) {
            $this->outcome[$itemName] = $itemValue;
        }
    }

    /**
     * @Then I should receive an array with the follow data:
     */
    public function iShouldReceiveAnArrayWithTheFollowData(TableNode $itemsData)
    {
        $expectedItems = [];
        foreach ($itemsData as $data) {
            $expectedItems[$data['name']] = $data['value'];
        }

        assertEquals($expectedItems, $this->outcome);
    }
}
