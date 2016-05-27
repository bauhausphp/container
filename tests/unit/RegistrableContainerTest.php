<?php

namespace Bauhaus\Container;

class RegistrableContainerTest extends \PHPUnit_Framework_TestCase
{
    private $container = null;

    protected function setUp()
    {
        $this->container = new FakeRegistrableContainer();
    }

    /**
     * @test
     * @dataProvider namesAndValuesOfItemsToRegister
     */
    public function shouldBeAbleToRetrieveValueAfterRegisterNewItem($itemName, $itemValue)
    {
        $this->container->register($itemName, $itemValue);

        $this->assertEquals($itemValue, $this->container->get($itemName));
    }

    /**
     * @test
     * @dataProvider namesAndValuesOfItemsToRegister
     * @expectedException Bauhaus\Container\Exception\ContainerItemAlreadyExistsException
     */
    public function exceptionOccursWhenTryToRegisterAnItemWithATakenName($itemName, $itemValue)
    {
        $this->container->register($itemName, $itemValue);
        $this->container->register($itemName, $itemValue);
    }

    public function namesAndValuesOfItemsToRegister()
    {
        return [
            ['pokemon', 'Charmander'],
            ['pirate', 'Barbossa'],
            ['music', 'Right Now'],
            ['instrument', 'Bass'],
            ['follow', 'The White Rabbit'],
        ];
    }
}
