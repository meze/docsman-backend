<?php
declare(strict_types = 1);
namespace Docsman\Application\Project\Command;

use Docsman\Core\Contract\ICommand;

class SaveProjectCommand implements ICommand
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * SaveProjectCommand constructor.
     *
     * @param string $name
     * @param int    $id
     */
    public function __construct(string $name, int $id = 0)
    {
        $this->name = $name;
        $this->id = $id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        if ($this->id > 0) {
            throw new \RuntimeException('The command already has an identifier.');
        }

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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
