<?php

namespace Bauhaus\Container;

use Bauhaus\Container;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
    private $factory = null;
    private $container = null;

    protected function setUp()
    {
        $this->container = new ContainerExtended([
            'pokemon' => 'charmander',
        ]);

        $this->factory = new Factory($this->container);
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
        $expectedInstanceOf = get_class($this->container);

        $newContainer = $this->factory->containerWithItemAdded($newItemLabel, $newItemValue);

        $this->assertNotSame($this->container, $newContainer);
        $this->assertEquals($expectedItems, $newContainer->items());
        $this->assertInstanceOf($expectedInstanceOf, $newContainer);
    }

    /**
     * @test
     * @expectedException Bauhaus\Container\ItemAlreadyExistsException
     * @expectedExceptionMessage There is already an item registered with label 'pokemon'
     */
    public function exceptionOccursWhenTryToAddItemWithLabelAlreadyTaken()
    {
        $this->factory->containerWithItemAdded('pokemon', 'pikachu');
    }

    /**
     * @test
     */
    public function aContainerWithItemReplacedIsReturnedGivenAContainerAndAnItem()
    {
        $itemLabel = 'pokemon';
        $itemNewValue = 'pikachu';

        $expectedInstanceOf = get_class($this->container);
        $expectedItems = [$itemLabel => $itemNewValue];

        $newContainer = $this->factory->containerWithItemReplaced($itemLabel, $itemNewValue);

        $this->assertNotSame($this->container, $newContainer);
        $this->assertEquals($expectedItems, $newContainer->items());
        $this->assertInstanceOf($expectedInstanceOf, $newContainer);
    }

    /**
     * @test
     * @expectedException Bauhaus\Container\ItemNotFoundException
     * @expectedExceptionMessage No item 'wrongLabel' was found in container
     */
    public function exceptionOccursWhenTryToReplaceAnItemThatDoesNotExist()
    {
        $this->factory->containerWithItemReplaced('wrongLabel', 'value');
    }

    /**
     * @test
     */
    public function aContainerWithoutAnItemGivenItsLabel()
    {
        $expectedInstanceOf = get_class($this->container);

        $newContainer = $this->factory->containerWithoutItem('pokemon');

        $this->assertNotSame($this->container, $newContainer);
        $this->assertEquals([], $newContainer->items());
        $this->assertInstanceOf($expectedInstanceOf, $newContainer);
    }

    /**
     * @test
     * @expectedException Bauhaus\Container\ItemNotFoundException
     * @expectedExceptionMessage No item 'wrongLabel' was found in container
     */
    public function exceptionOccursWhenTryToRemoveAnItemThatDoesNotExist()
    {
        $this->factory->containerWithoutItem('wrongLabel');
    }
}
