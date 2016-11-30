<?php
declare(strict_types = 1);
namespace Docsman\Core\Contract;

interface ICommandDispatcher
{
    /**
     * @param ICommand $query
     *
     * @return mixed
     */
    public function dispatch(ICommand $query): void;
}
