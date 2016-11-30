<?php
declare(strict_types = 1);
namespace Tests\Docsman\Core;

use Docsman\Core\Contract\Query;
use Docsman\Core\Contract\IQueryHandler;

class StubQueryHandler implements IQueryHandler
{
    /**
     * @param StubQuery $query
     *
     * @return string
     */
    public function retrieve(Query $query): string
    {
        $query->isCalled = true;

        return 'test';
    }
}
