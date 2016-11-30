<?php
declare(strict_types = 1);
namespace Docsman\Application\Project\Query;

use Docsman\Core\Contract\Query;
use Docsman\Model\Project;

class SingleProjectQuery extends Query
{
    /**
     * @var int
     */
    private $id;

    /**
     * SingleProjectQuery constructor.
     *
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Project
     */
    public function getResult(): Project
    {
        return $this->result;
    }
}
