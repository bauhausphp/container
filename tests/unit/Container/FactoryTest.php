<?php

namespace Bauhaus\Container;

use Bauhaus\Container;
use Bauhaus\Container\ContainerExtended;

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
        $newContainer = $this->factory->containerWithItemAdded('music', 'right now');

        $this->assertNotSame($this->container, $newContainer);
        $this->assertInstanceOf('Bauhaus\Container\ContainerExtended', $newContainer);
        $this->assertEquals(
            array_merge($this->container->items(), ['music' => 'right now']),
            $newContainer->items()
        );
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
        $newContainer = $this->factory->containerWithItemReplaced('pokemon', 'pickachu');

        $this->assertNotSame($this->container, $newContainer);
        $this->assertInstanceOf('Bauhaus\Container\ContainerExtended', $newContainer);
        $this->assertEquals(['pokemon' => 'pickachu'], $newContainer->items());
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
        $newContainer = $this->factory->containerWithoutItem('pokemon');

        $this->assertNotSame($this->container, $newContainer);
        $this->assertInstanceOf('Bauhaus\Container\ContainerExtended', $newContainer);
        $this->assertEquals([], $newContainer->items());
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
