<?php
declare(strict_types = 1);
namespace Docsman\Application\Document\Command;

use Docsman\Core\Contract\ICommand;

class SaveDocumentCommand implements ICommand
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
     * @var int
     */
    private $projectId;

    /**
     * @var string
     */
    private $content;

    /**
     * SaveDocumentCommand constructor.
     *
     * @param int    $projectId
     * @param string $name
     * @param string $content
     * @param int    $id
     */
    public function __construct(int $projectId, string $name, string $content, $id = 0)
    {
        $this->projectId = $projectId;
        $this->name = $name;
        $this->content = $content;
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->projectId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        if ($this->id > 0) {
            throw new \RuntimeException('The command already has an identifier.');
        }

        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
