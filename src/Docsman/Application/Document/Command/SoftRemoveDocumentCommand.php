<?php
declare(strict_types = 1);
namespace Docsman\Application\Document\Command;

use Docsman\Core\Contract\ICommand;

class SoftRemoveDocumentCommand implements ICommand
{
    /**
     * @var int
     */
    private $id;

    /**
     * TrashDocumentCommand constructor.
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
}
