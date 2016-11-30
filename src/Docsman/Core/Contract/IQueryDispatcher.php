<?php
declare(strict_types = 1);
namespace Docsman\Core\Contract;

interface IQueryDispatcher
{
    /**
     * @param Query $query
     *
     * @return Query
     */
    public function dispatch(Query $query): Query;
}
