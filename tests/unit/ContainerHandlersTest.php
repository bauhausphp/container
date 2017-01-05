<?php

namespace Bauhaus;

class ContainerHandlersTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage The item 'integer' can not be contained in this container
     */
    public function invalidArgumentExceptionOccursWhenContainerCanNotContainItem()
    {
        new StringContainer(['integer' => 14031879]);
    }
    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Custom exception message: integer
     */
    public function customizeInvalidArgumentExceptionMessageWhenContainerCanNotContainItem()
    {
        new StringContainerWithCustomMessageOfItemCanNotBeContainedException(
            [
                'integer' => 14031879
            ]
        );
    }

    /**
     * @test
     */
    public function returnCustomizedValueWhenItemIsNotFound()
    {
        $container = new ContainerThatReturnsNullWhenItemIsNotFound();

        $this->assertNull($container->get('some-label'));
    }
}
