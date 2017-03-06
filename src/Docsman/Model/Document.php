<?php
declare(strict_types = 1);
namespace Docsman\Model;

final class Document
{
    public const DEFAULT_NAME = 'A document';

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $creationDate;

    /**
     * @var Project
     */
    private $project;

    /**
     * @var string
     */
    private $content;

    /**
     * @var bool
     */
    private $isTrash = false;

    /**
     * Document constructor.
     *
     * @param Project $project
     * @param string  $name
     * @param string  $content
     */
    public function __construct(Project $project, string $name, $content = '')
    {
        $this->project = $project;
        $this->rename($name);
        $this->content = $content;
        $this->creationDate = new \DateTime('now', new \DateTimeZone('UTC'));
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate(): \DateTime
    {
        return $this->creationDate;
    }

    /**
     * @return int
     */
    public function getProjectId(): int
    {
        return $this->project->getId();
    }

    /**
     * @param string $name
     *
     * @return void
     */
    public function rename(string $name)
    {
        if ( ! empty($name)) {
            $this->name = $name;
        } else {
            $this->name = self::DEFAULT_NAME;
        }
    }

    /**
     * @param string $content
     *
     * @return void
     */
    public function setContent(string $content)
    {
        $this->content = $content;
    }

    /**
     * @return bool
     */
    public function isTrash(): bool
    {
        return $this->isTrash;
    }

    /**
     * @return void
     */
    public function softRemove()
    {
        $this->isTrash = true;
    }
}
