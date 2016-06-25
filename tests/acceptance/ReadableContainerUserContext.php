<?php

namespace Bauhaus\Container;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

require __DIR__ . '/../bootstrap.php';

class ReadableContainerUserContext implements Context, SnippetAcceptingContext
{
    private $container = null;
    private $outcome = null;

    /**
     * @Transform table:label,value
     */
    public function castItemsTableToArray(TableNode $itemsTable): array
    {
        $items = [];
        foreach ($itemsTable as $row) {
            $items[$row['label']] = $row['value'];
        }

        return $items;
    }

    /**
     * @Transform /true|false/
     */
    public function castStringToBoolean(string $string): bool
    {
        if ('true' == $string) {
            return true;
        }

        return false;
    }

    /**
     * @Given (I am )a readable container with the following items:
     */
    public function aReadableContainerWithTheFolloingItems(array $items)
    {
        $this->container = new FakeReadableContainer($items);
    }

    /**
     * @When I verify if the item :label exists
     */
    public function iVerifyIfTheItemExists($label)
    {
        $this->outcome = $this->container->has($label);
    }

    /**
     * @When I require the value of the item :label
     */
    public function iRequireTheValueOfTheItem($label)
    {
        $this->outcome = $this->container->$label;
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
            $this->container->$label;
        } catch (\Exception $e) {
            $this->outcome = $e;
        }
    }

    /**
     * @When I try to register an item with label :label and value :value
     */
    public function iTryToRegisterAnItemWithLabelAndValue($label, $value)
    {
        try {
            $this->container->register($label, $value);
        } catch (\Exception $e) {
            $this->outcome = $e;
        }
    }

    /**
     * @Then I should receive( the) :expectedValue
     */
    public function iShouldReceive($expectedValue)
    {
        assertEquals($expectedValue, $this->outcome);
    }

    /**
     * @Then I should receive (an array with) the following items( at the same order):
     */
    public function iShouldReceiveAnArrayWithTheFollowData(array $expectedItems)
    {
        assertEquals($expectedItems, $this->outcome);
    }

    /**
     * @Then the exception :exceptionClass is throwed with the message:
     */
    public function theExceptionIsThrowedWithTheMessage(
        $exceptionClass,
        PyStringNode $message
    ) {
        assertInstanceOf($exceptionClass, $this->outcome);
        assertEquals($message->getRaw(), $this->outcome->getMessage());
    }
}
