<?php
declare(strict_types = 1);
namespace Tests\Docsman\Core;

use Docsman\Core\Contract\ICommand;
use Docsman\Core\Contract\ICommandHandler;

class StubCommandHandler implements ICommandHandler
{
    /**
     * @param StubCommand $command
     *
     * @return mixed
     */
    public function execute(ICommand $command): void
    {
        $command->isExecuted = true;
    }
}
