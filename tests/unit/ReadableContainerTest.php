<?php

namespace Bauhaus\Container;

class ReadableContainerTest extends \PHPUnit_Framework_TestCase
{
    private $container = null;

    protected function setUp()
    {
        $this->container = new FakeReadableContainer($this->readableContainerItems());
    }

    protected function readableContainerItems()
    {
        return [
            'pokemon' => 'Charmander',
            'pirate' => 'Barbossa',
            'music' => 'Right Now',
            'instrument' => 'Bass',
            'follow' => 'The White Rabbit',
        ];
    }

    protected function nonExistingLabels()
    {
        return [
            'aName',
            'anotherName',
            '',
        ];
    }

    /**
     * @test
     * @dataProvider labelsAndTheyExistence
     */
    public function verifyThatItemExistsByItsLabel($label, $exists)
    {
        $this->assertTrue($this->container->has($label) === $exists);
    }

    public function labelsAndTheyExistence()
    {
        foreach (array_keys($this->readableContainerItems()) as $label) {
            yield [$label, true];
        }

        foreach ($this->nonExistingLabels() as $label) {
            yield [$label, false];
        }
    }

    /**
     * @test
     * @dataProvider labelsAndValuesOfItems
     */
    public function retrieveTheValueOfAnItemByItsLabel($label, $expectedValue)
    {
        $this->assertEquals($expectedValue, $this->container->$label);
    }

    public function labelsAndValuesOfItems()
    {
        foreach ($this->readableContainerItems() as $label => $value) {
            yield [$label, $value];
        }
    }

    /**
     * @test
     */
    public function retrieveAllItemsWhenCallingTheMethodAll()
    {
        $this->assertEquals(
            $this->readableContainerItems(),
            $this->container->all()
        );
    }

    /**
     * @test
     */
    public function retrieveAllItemsWhenItIsIterated()
    {
        $outcome = [];
        foreach ($this->container as $label => $value) {
            $outcome[$label] = $value;
        }

        $this->assertEquals($this->readableContainerItems(), $outcome);
    }

    /**
     * @test
     * @expectedException Bauhaus\Container\Exception\ContainerItemNotFound
     * @expectedExceptionMessage No item labeled as 'nonExistingLabel' was found in this container
     */
    public function exceptionOccursWhenTryToRetriveAnItemWithNonExistingLabel()
    {
        $this->container->nonExistingLabel;
    }

    /**
     * @test
     * @expectedException Bauhaus\Container\Exception\ContainerItemAlreadyExists
     * @expectedExceptionMessage There is already an item with label 'pokemon' in this container
     */
    public function exceptionOccursWhenTryToRegisterAnItemWithAnAlreadyTakenLabel()
    {
        $this->container->register('pokemon', 'Charmander');
    }
}
