<?php
declare(strict_types = 1);

namespace Docsman\Model;

final class Application
{
    /**
     * @var int
     */
    private $id;

    /**
     * Application constructor.
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
