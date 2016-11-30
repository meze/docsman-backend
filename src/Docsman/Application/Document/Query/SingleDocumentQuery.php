<?php
declare(strict_types = 1);
namespace Docsman\Application\Document\Query;

use Docsman\Core\Contract\Query;
use Docsman\Model\Document;

class SingleDocumentQuery extends Query
{
    /**
     * @var int
     */
    private $id;

    /**
     * SingleDocumentQuery constructor.
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
     * @return Document
     */
    public function getResult(): Document
    {
        return $this->result;
    }
}
