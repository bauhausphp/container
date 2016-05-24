<?php

namespace Bauhaus\Container;

class ReadableContainerTest extends \PHPUnit_Framework_TestCase
{
    private $container = null;

    protected function setUp()
    {
        $items = [];
        foreach ($this->namesAndValuesOfExistingItems() as $data) {
            $items[$data[0]] = $data[1];
        }

        $this->container = new FakeReadableContainer($items);
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
        return [
            ['pokemon', 'Charmander'],
            ['pirate', 'Barbossa'],
            ['music', 'Right Now'],
            ['instrument', 'Bass'],
            ['follow', 'The White Rabbit'],
        ];
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
}
