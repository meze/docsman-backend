<?php
declare(strict_types = 1);
namespace Tests\Docsman\Core;

use Docsman\Core\CommandDispatcher;
use Docsman\Core\CommandHandlerLocator;

class CommandDispatcherTest extends \PHPUnit_Framework_TestCase
{
    public function testExecutesCommand()
    {
        $locator = new CommandHandlerLocator();
        $locator->add(StubCommand::class, new StubCommandHandler());

        $command = new StubCommand();
        $dispatcher = new CommandDispatcher($locator);

        $dispatcher->dispatch($command);

        $this->assertTrue($command->isExecuted);
    }
}
