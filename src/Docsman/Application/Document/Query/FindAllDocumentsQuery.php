<?php
declare(strict_types = 1);
namespace Docsman\Application\Document\Query;

use Docsman\Core\Contract\Query;
use Docsman\Model\Document;

class FindAllDocumentsQuery extends Query
{
    /**
     * @var int
     */
    private $projectId;

    /**
     * FindAllDocumentsQuery constructor.
     *
     * @param int $projectId
     */
    public function __construct(int $projectId)
    {
        $this->projectId = $projectId;
    }

    /**
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }

    /**
     * @return Document[]
     */
    public function getResult(): array
    {
        return $this->result;
    }
}
