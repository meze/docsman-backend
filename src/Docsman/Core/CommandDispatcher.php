<?php
declare(strict_types = 1);
namespace Docsman\Core;

use Docsman\Core\Contract\ICommand;
use Docsman\Core\Contract\ICommandDispatcher;
use Docsman\Core\Contract\ICommandHandlerLocator;

final class CommandDispatcher implements ICommandDispatcher
{
    /**
     * @var ICommandHandlerLocator
     */
    private $handlerLocator;

    /**
     * CommandDispatcher constructor.
     *
     * @param ICommandHandlerLocator $handlerLocator
     */
    public function __construct(ICommandHandlerLocator $handlerLocator)
    {
        $this->handlerLocator = $handlerLocator;
    }

    /**
     * @param ICommand $command
     */
    public function dispatch(ICommand $command): void
    {
        $this->handlerLocator->get(get_class($command))->execute($command);
    }
}
