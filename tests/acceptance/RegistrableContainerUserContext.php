<?php

namespace Bauhaus\Container;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use Bauhaus\Container\FakeRegistrableContainer;

require __DIR__ . '/../bootstrap.php';

class RegistrableContainerUserContext implements Context, SnippetAcceptingContext
{
    private $container = null;
    private $outcome = null;

    /**
     * @Given a registrable container with the follow items:
     */
    public function aRegistrableContainerWithTheFollowItems(TableNode $itemsData)
    {
        $this->container = new FakeRegistrableContainer();

        foreach ($itemsData as $data) {
            $this->container->register($data['name'], $data['value']);
        }
    }

    /**
     * @When I register a new item with name :itemName and value :itemValue
     */
    public function iRegisterANewItemWithNameAndValue($itemName, $itemValue)
    {
        $this->container->register($itemName, $itemValue);
    }

    /**
     * @Then I should retrieve :expectedItemValue requesting the item :itemName
     */
    public function iShouldRetrieveRequestingTheItem($expectedItemValue, $itemName)
    {
        assertEquals($expectedItemValue, $this->container->get($itemName));
    }

    /**
     * @When I try to register a new item with name :itemName
     */
    public function iTryToRegisterANewItemWithName($itemName)
    {
        try {
            $this->container->register($itemName, 'someValue');
        } catch (\Exception $e) {
            $this->outcome = $e;
        }
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
}
