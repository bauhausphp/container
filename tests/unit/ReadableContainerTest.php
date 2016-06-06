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
    public function verifyThatItemExistsByLabel($label, $exists)
    {
        $this->assertEquals($this->container->has($label), $exists);
    }

    public function labelsAndTheyExistence()
    {
        foreach ($this->readableContainerItems() as $label => $value) {
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
    public function retrieveTheValueOfItemByLabel($label, $expectedValue)
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
    public function retrieveAllItemsWhenContainerIsIterated()
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
     * @expectedExceptionMessage No item labeled as 'nonExistingLabel' was found in container
     */
    public function exceptionOccursWhenTryToRetriveNonExistingItem()
    {
        $this->container->nonExistingLabel;
    }
}
