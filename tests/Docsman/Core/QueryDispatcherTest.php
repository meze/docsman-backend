<?php
declare(strict_types = 1);
namespace Tests\Docsman\Core;

use Docsman\Core\Contract\IQuery;
use Docsman\Core\Contract\IQueryDispatcher;
use Docsman\Core\Contract\IQueryHandler;
use Docsman\Core\QueryDispatcher;
use Docsman\Core\QueryHandlerLocator;

class QueryDispatcherTest extends \PHPUnit_Framework_TestCase
{
    public function testExecutesQuery()
    {
        $locator = new QueryHandlerLocator();
        $locator->add(StubQuery::class, new StubQueryHandler());
        $query = new StubQuery();

        $result = (new QueryDispatcher($locator))->dispatch($query)->getResult();

        $this->assertTrue($query->isCalled);
        $this->assertEquals('test', $result);
    }
}
