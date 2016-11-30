<?php
declare(strict_types = 1);
namespace Docsman\Model;

use Doctrine\Common\Collections\ArrayCollection;

class Project
{
    public const DEFAULT_NAME = 'A project';

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $id;

    /**
     * @var ArrayCollection
     */
    private $documents;

    /**
     * Project constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->rename($name);
        $this->documents = new ArrayCollection();
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
     * @param null|string $name
     *
     * @return void
     */
    public function rename(string $name)
    {
        if (!empty($name)) {
            $this->name = $name;
        } else {
            $this->name = self::DEFAULT_NAME;
        }
    }
}
