<?php
declare(strict_types = 1);
namespace Docsman\Core\Contract;

abstract class Query
{
    /**
     * @var mixed
     */
    protected $result;

    /**
     * @return mixed
     */
    abstract public function getResult();

    /**
     * @param mixed $result
     *
     * @return void
     */
    public function setResult($result): void
    {
        $this->result = $result;
    }
}
