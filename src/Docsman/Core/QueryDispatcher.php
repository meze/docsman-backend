<?php
declare(strict_types = 1);
namespace Docsman\Core;

use Docsman\Core\Contract\IQuery;
use Docsman\Core\Contract\IQueryDispatcher;
use Docsman\Core\Contract\IQueryHandlerLocator;
use Docsman\Core\Contract\Query;

final class QueryDispatcher implements IQueryDispatcher
{
    /**
     * @var IQueryHandlerLocator
     */
    private $handlerLocator;

    /**
     * QueryDispatcher constructor.
     *
     * @param IQueryHandlerLocator $handlerLocator
     */
    public function __construct(IQueryHandlerLocator $handlerLocator)
    {
        $this->handlerLocator = $handlerLocator;
    }

    /**
     * @param Query $query
     *
     * @return Query
     */
    public function dispatch(Query $query): Query
    {
        $handler = $this->handlerLocator->get(get_class($query));

        $query->setResult($handler->retrieve($query));

        return $query;
    }
}
