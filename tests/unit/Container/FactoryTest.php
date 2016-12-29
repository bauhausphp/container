<?php

namespace Bauhaus\Container;

use Bauhaus\Container;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
    private $factory = null;
    private $container = null;

    protected function setUp()
    {
        $this->factory = new Factory();

        $this->container = new Container([
            'pokemon' => 'charmander',
        ]);
    }

    /**
     * @test
     */
    public function aContainerWithItemAddedIsReturnedGivenAContainerAndAnItem()
    {
        $newItemLabel = 'music';
        $newItemValue = 'right now';
        $expectedItems = array_merge($this->container->items(), [
            $newItemLabel => $newItemValue,
        ]);

        $newContainer = $this->factory->containerWithItemAdded(
            $this->container,
            $newItemLabel,
            $newItemValue
        );

        $this->assertNotSame($this->container, $newContainer);
        $this->assertEquals($expectedItems, $newContainer->items());
    }

    /**
     * @test
     * @expectedException Bauhaus\Container\ItemAlreadyExistsException
     * @expectedExceptionMessage There is already an item registered with label 'pokemon'
     */
    public function exceptionOccursWhenTryToAddItemWithLabelAlreadyTaken()
    {
        $this->factory->containerWithItemAdded($this->container, 'pokemon', 'pikachu');
    }
}
