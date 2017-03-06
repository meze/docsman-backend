<?php
declare(strict_types = 1);
namespace Docsman\Application\Document\Query;

use Docsman\Application\DoctrineQueryHandler;
use Docsman\Core\Contract\Query;
use Docsman\Core\Contract\IQueryHandler;
use Docsman\Model\Document;

class FindAllDocumentsQueryHandler extends DoctrineQueryHandler implements IQueryHandler
{
    /**
     * @param FindAllDocumentsQuery|Query $query
     *
     * @throws \UnexpectedValueException
     * @return Document[]
     */
    public function retrieve(Query $query): array
    {
        $repository = $this->doctrineRegistry->getRepository(Document::class);

        return $repository->findBy([
            'project' => $query->getProjectId(),
            'isTrash' => false
        ], [
            'creationDate' => 'desc'
        ]);
    }
}
