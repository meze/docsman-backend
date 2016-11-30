<?php
declare(strict_types = 1);
namespace Tests\Docsman\Core;

use Docsman\Core\CommandHandlerLocator;

class CommandHandlerLocatorTest extends \PHPUnit_Framework_TestCase
{
    public function testGetsCorrectHandler()
    {
        $locator = new CommandHandlerLocator([
            'another'  => new StubCommandHandler(),
            'expected' => $expected = new StubCommandHandler()
        ]);

        $this->assertEquals($expected, $locator->get('expected'));
    }

    public function testThrowsExceptionIfIsNotRegistered()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessageRegExp('/is not registered/');

        (new CommandHandlerLocator())->get('unknown');
    }

    public function testCallsCallableIfHandlerIsLazy()
    {
        $wasCalled = false;
        $expected = new StubCommandHandler();
        $locator = new CommandHandlerLocator([
            'callable' => function () use ($expected, &$wasCalled) {
                $wasCalled = true;

                return $expected;
            }
        ]);

        $this->assertFalse($wasCalled);
        $this->assertEquals($expected, $locator->get('callable'));
        $this->assertTrue($wasCalled);
    }

    public function testCallsCallableOnlyOnce()
    {
        $numOfCalls = 0;
        $locator = new CommandHandlerLocator([
            'callable' => function () use (&$numOfCalls) {
                $numOfCalls++;

                return new StubCommandHandler();
            }
        ]);

        $locator->get('callable');
        $locator->get('callable');

        $this->assertEquals(1, $numOfCalls);
    }
}
