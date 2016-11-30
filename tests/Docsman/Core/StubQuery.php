<?php
declare(strict_types = 1);
namespace Tests\Docsman\Core;

use Docsman\Core\Contract\Query;

class StubQuery extends Query
{
    /**
     * @var bool
     */
    public $isCalled = false;

    /**
     * @return string
     */
    public function getResult(): string
    {
        return $this->result;
    }
}
