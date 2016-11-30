<?php
declare(strict_types = 1);
namespace Docsman\Core\Contract;

interface ICommandHandlerLocator
{
    /**
     * @param string          $name
     * @param ICommandHandler $handler
     *
     * @return mixed
     */
    public function add(string $name, ICommandHandler $handler): void;

    /**
     * @param string $name
     *
     * @return ICommandHandler
     */
    public function get(string $name): ICommandHandler;
}
