<?php
declare(strict_types = 1);
namespace Tests\Docsman\Core;

use Docsman\Core\Contract\ICommand;

class StubCommand implements ICommand
{
    /**
     * @var bool
     */
    public $isExecuted = false;
}
