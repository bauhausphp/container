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
     * @dataProvider labelsAndValuesToRegister
     */
    public function shouldBeAbleToRegisterNewItem($label, $value)
    {
        $this->container->register($label, $value);

        $this->assertEquals($value, $this->container->$label);
    }

    public function labelsAndValuesToRegister()
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
     * @expectedException Bauhaus\Container\Exception\ContainerItemAlreadyExists
     * @expectedExceptionMessage There is already an item with label 'someLabel'
     */
    public function exceptionOccursWhenTryToRegisterAnItemWithATakenName()
    {
        $this->container->register('someLabel', 'someValue');
        $this->container->register('someLabel', 'someValue');
    }
}
