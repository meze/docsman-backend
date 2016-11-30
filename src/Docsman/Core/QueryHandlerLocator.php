<?php
declare(strict_types = 1);
namespace Docsman\Core;

use Docsman\Core\Contract\IQueryHandler;
use Docsman\Core\Contract\IQueryHandlerLocator;

final class QueryHandlerLocator extends HandlerLocator implements IQueryHandlerLocator
{
    /**
     * QueryHandlerLocator constructor.
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
     * @param string        $name
     * @param IQueryHandler $handler
     */
    public function add(string $name, IQueryHandler $handler): void
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
     * @throws \RuntimeException
     * @return IQueryHandler
     */
    public function get(string $name): IQueryHandler
    {
        return parent::getHandler($name);
    }
}
