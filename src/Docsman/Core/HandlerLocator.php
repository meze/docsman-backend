<?php
declare(strict_types = 1);
namespace Docsman\Core;

abstract class HandlerLocator
{
    /**
     * @var array
     */
    private $handlers = [];

    /**
     * @param array $handlers
     */
    public function addAll(array $handlers): void
    {
        foreach ($handlers as $name => $handler) {
            $this->addHandler($name, $handler);
        }
    }

    /**
     * @param string          $name
     * @param object|callable $handler
     */
    protected function addHandler(string $name, $handler): void
    {
        $this->handlers[$name] = $handler;
    }

    /**
     * @param string $name
     *
     * @throws \RuntimeException
     * @return mixed
     */
    protected function getHandler(string $name)
    {
        if ( ! array_key_exists($name, $this->handlers)) {
            throw new \RuntimeException("A handler for '{$name}' is not registered.");
        }

        if (is_callable($this->handlers[$name])) {
            $this->handlers[$name] = $this->handlers[$name]();
        }

        return $this->handlers[$name];
    }
}
