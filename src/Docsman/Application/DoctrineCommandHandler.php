<?php
declare(strict_types = 1);
namespace Docsman\Application;

use Doctrine\Bundle\DoctrineBundle\Registry;

abstract class DoctrineCommandHandler
{
    /**
     * @var Registry
     */
    protected $doctrineRegistry;

    /**
     * DoctrineCommandHandler constructor.
     *
     * @param Registry $doctrineRegistry
     */
    public function __construct(Registry $doctrineRegistry)
    {
        if ($doctrineRegistry === null) {
            throw new \InvalidArgumentException('Doctrine registry must be provided');
        }

        $this->doctrineRegistry = $doctrineRegistry;
    }
}
