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

    /**
     * @test
     * @dataProvider namesAndValuesOfExistingItems
     */
    public function verificationThatItemExistsByItsName($itemName)
    {
        $this->assertTrue($this->container->has($itemName));
    }

    /**
     * @test
     * @dataProvider namesAndValuesOfExistingItems
     */
    public function retrieveTheValueOfExistingItemByItsName($itemName, $itemValue)
    {
        $this->assertEquals($itemValue, $this->container->get($itemName));
    }

    /**
     * @test
     * @dataProvider namesAndValuesOfExistingItems
     */
    public function retrieveMagicallyTheValueOfExistingItemByItsName($itemName, $itemValue)
    {
        $this->assertEquals($itemValue, $this->container->{$itemName});
    }

    public function namesAndValuesOfExistingItems()
    {
        $items = $this->readableContainerItems();

        $data = [];
        foreach ($items as $name => $value) {
            $data[] = [$name, $value];
        }

        return $data;
    }

    /**
     * @test
     * @dataProvider namesOfNonExistingItems
     */
    public function verificationThatItemDoesNotExistBySomeName($itemName)
    {
        $this->assertFalse($this->container->has($itemName));
    }

    /**
     * @test
     * @dataProvider namesOfNonExistingItems
     * @expectedException Bauhaus\Container\Exception\ContainerItemNotFoundException
     */
    public function exceptionOccursWhenTryToRetriveNonExistingItem($itemName)
    {
        $this->container->get($itemName);
    }

    /**
     * @test
     * @dataProvider namesOfNonExistingItems
     * @expectedException Bauhaus\Container\Exception\ContainerItemNotFoundException
     */
    public function exceptionOccursWhenTryToRetriveMagicallyNonExistingItem($itemName)
    {
        $this->container->{$itemName};
    }

    public function namesOfNonExistingItems()
    {
        return [
            ['aName'],
            ['anotherName'],
            [''],
            ['bla'],
            ['blu'],
        ];
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
    public function retrieveEachItemWhenItIsIterated()
    {
        $outcome = [];
        foreach ($this->container as $itemName => $itemValue) {
            $outcome[$itemName] = $itemValue;
        }

        $this->assertEquals($this->readableContainerItems(), $outcome);
    }
}
