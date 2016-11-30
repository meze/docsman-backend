<?php
declare(strict_types = 1);
namespace Docsman\Core\Contract;

interface IQueryHandlerLocator
{
    /**
     * @param string        $name
     * @param IQueryHandler $handler
     *
     * @return mixed
     */
    public function add(string $name, IQueryHandler $handler): void;

    /**
     * @param string $name
     *
     * @return IQueryHandler
     */
    public function get(string $name): IQueryHandler;
}
