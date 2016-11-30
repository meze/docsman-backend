<?php
declare(strict_types = 1);
namespace Docsman\Core\Contract;

interface ICommandHandler
{
    /**
     * @param ICommand $command
     */
    public function execute(ICommand $command): void;
}
