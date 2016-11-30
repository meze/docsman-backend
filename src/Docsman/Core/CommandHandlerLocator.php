<?php
declare(strict_types = 1);
namespace Docsman\Core;

use Docsman\Core\Contract\ICommandHandler;
use Docsman\Core\Contract\ICommandHandlerLocator;

final class CommandHandlerLocator extends HandlerLocator implements ICommandHandlerLocator
{
    /**
     * CommandHandlerLocator constructor.
     *
     * @param array|null $handlers
     */
    public function __construct(array $handlers = null)
    {
        if ($handlers !== null) {
            $this->addAll($handlers);
        }
    }

    /**
     * @param string          $name
     * @param ICommandHandler $handler
     */
    public function add(string $name, ICommandHandler $handler): void
    {
        parent::addHandler($name, $handler);
    }

    /**
     * @param string   $name
     * @param callable $handler
     */
    public function addLazy(string $name, callable $handler): void
    {
        parent::addHandler($name, $handler);
    }

    /**
     * @param string $name
     *
     * @return ICommandHandler
     */
    public function get(string $name): ICommandHandler
    {
        return parent::getHandler($name);
    }
}
