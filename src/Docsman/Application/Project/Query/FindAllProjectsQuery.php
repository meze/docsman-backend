<?php
declare(strict_types = 1);
namespace Docsman\Application\Project\Query;

use Docsman\Core\Contract\Query;
use Docsman\Model\Project;

class FindAllProjectsQuery extends Query
{
    /**
     * @return Project[]
     */
    public function getResult(): array
    {
        return $this->result;
    }
}
