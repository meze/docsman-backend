<?php
declare(strict_types = 1);
namespace Docsman\Application\Project\Query;

use Docsman\Application\DoctrineQueryHandler;
use Docsman\Core\Contract\Query;
use Docsman\Core\Contract\IQueryHandler;
use Docsman\Model\Project;

class FindAllProjectsQueryHandler extends DoctrineQueryHandler implements IQueryHandler
{
    /**
     * @param FindAllProjectsQuery $query
     *
     * @return array
     */
    public function retrieve(Query $query): array
    {
        $repository = $this->doctrineRegistry->getRepository(Project::class);

        return $repository->findAll();
    }
}
