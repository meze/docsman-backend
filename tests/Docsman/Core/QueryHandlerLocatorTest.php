<?php
declare(strict_types = 1);
namespace Tests\Docsman\Core;

use Docsman\Core\QueryHandlerLocator;

class QueryHandlerLocatorTest extends \PHPUnit_Framework_TestCase
{
    public function testGetsCorrectHandler()
    {
        $locator = new QueryHandlerLocator([
            'another'  => new StubQueryHandler(),
            'expected' => $expected = new StubQueryHandler()
        ]);

        $this->assertEquals($expected, $locator->get('expected'));
    }

    public function testThrowsExceptionIfIsNotRegistered()
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessageRegExp('/is not registered/');

        (new QueryHandlerLocator())->get('unknown');
    }

    public function testCallsCallableIfHandlerIsLazy()
    {
        $wasCalled = false;
        $expected = new StubQueryHandler();
        $locator = new QueryHandlerLocator([
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
        $locator = new QueryHandlerLocator([
            'callable' => function () use (&$numOfCalls) {
                $numOfCalls++;

                return new StubQueryHandler();
            }
        ]);

        $locator->get('callable');
        $locator->get('callable');

        $this->assertEquals(1, $numOfCalls);
    }
}
