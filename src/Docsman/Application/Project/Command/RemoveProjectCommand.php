<?php
declare(strict_types = 1);
namespace Docsman\Application\Project\Command;

use Docsman\Core\Contract\ICommand;

class RemoveProjectCommand implements ICommand
{
    /**
     * @var int
     */
    private $id;

    /**
     * RemoveProjectCommand constructor.
     *
     * @param int $id
     */
    public function __construct(int $id = 0)
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
