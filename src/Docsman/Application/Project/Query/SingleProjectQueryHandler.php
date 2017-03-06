<?php
declare(strict_types = 1);
namespace Docsman\Application\Project\Query;

use Docsman\Application\DoctrineQueryHandler;
use Docsman\Core\Contract\Query;
use Docsman\Core\Contract\IQueryHandler;
use Docsman\Model\Project;

class SingleProjectQueryHandler extends DoctrineQueryHandler implements IQueryHandler
{
    /**
     * @param SingleProjectQuery|Query $query
     *
     * @return Project|object|null
     */
    public function retrieve(Query $query): ?Project
    {
        $repository = $this->doctrineRegistry->getRepository(Project::class);

        return $repository->find($query->getId());
    }
}
