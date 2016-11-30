<?php
declare(strict_types = 1);
namespace Docsman\Core\Contract;

interface IQueryHandler
{
    /**
     * @param Query $query
     *
     * @return mixed
     */
    public function retrieve(Query $query);
}
