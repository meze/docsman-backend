<?php
declare(strict_types = 1);
namespace AppBundle\Locator;

use Docsman\Application\Document\Command\SaveDocumentCommand;
use Docsman\Application\Document\Query\FindAllDocumentsQuery;
use Docsman\Application\Document\Query\SingleDocumentQuery;
use Docsman\Application\Project\Command\RemoveProjectCommand;
use Docsman\Application\Project\Command\SaveProjectCommand;
use Docsman\Application\Project\Query\FindAllProjectsQuery;
use Docsman\Application\Project\Query\SingleProjectQuery;
use Docsman\Core\CommandHandlerLocator;
use Docsman\Core\QueryHandlerLocator;
use Symfony\Component\DependencyInjection\Container;

final class HandlerLocatorFactory
{
    /**
     * @return QueryHandlerLocator
     */
    static public function createQueryHandlersMap(Container $container): QueryHandlerLocator
    {
        $doctrine = $container->get('doctrine');

        $handlers = [];
        self::addLazy($handlers, SingleProjectQuery::class, $doctrine);
        self::addLazy($handlers, FindAllDocumentsQuery::class, $doctrine);
        self::addLazy($handlers, FindAllProjectsQuery::class, $doctrine);
        self::addLazy($handlers, SingleDocumentQuery::class, $doctrine);

        return new QueryHandlerLocator($handlers);
    }

    /**
     * @return CommandHandlerLocator
     */
    static public function createCommandHandlersMap(Container $container): CommandHandlerLocator
    {
        $doctrine = $container->get('doctrine');

        $handlers = [];
        self::addLazy($handlers, SaveDocumentCommand::class, $doctrine);
        self::addLazy($handlers, SaveProjectCommand::class, $doctrine);
        self::addLazy($handlers, RemoveProjectCommand::class, $doctrine);

        return new CommandHandlerLocator($handlers);
    }

    /**
     * @param array  $handlers
     * @param string $class
     * @param array  ...$args
     */
    static private function addLazy(array &$handlers, string $class, ...$args)
    {
        $handlers[$class] = function () use ($class, $args) {
            $name = "{$class}Handler";

            return new $name(...$args);
        };
    }
}
