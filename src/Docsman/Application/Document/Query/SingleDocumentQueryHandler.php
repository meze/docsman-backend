<?php
declare(strict_types = 1);
namespace Docsman\Application\Document\Query;

use Docsman\Application\DoctrineQueryHandler;
use Docsman\Core\Contract\Query;
use Docsman\Core\Contract\IQueryHandler;
use Docsman\Model\Document;

class SingleDocumentQueryHandler extends DoctrineQueryHandler implements IQueryHandler
{
    /**
     * @param SingleDocumentQuery|Query $query
     *
     * @return Document|object|null
     */
    public function retrieve(Query $query): ?Document
    {
        $repository = $this->doctrineRegistry->getRepository(Document::class);

        return $repository->findOneBy([
            'id' => $query->getId()
        ]);
    }
}
