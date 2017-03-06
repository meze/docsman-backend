<?php
declare(strict_types = 1);
namespace Docsman\Application\Project\Command;

use Docsman\Application\DoctrineCommandHandler;
use Docsman\Core\Contract\ICommand;
use Docsman\Core\Contract\ICommandHandler;
use Docsman\Model\Project;

class RemoveProjectCommandHandler extends DoctrineCommandHandler implements ICommandHandler
{
    /**
     * @param RemoveProjectCommand|ICommand $command
     *
     * @throws \InvalidArgumentException
     * @return void
     */
    public function execute(ICommand $command): void
    {
        $manager = $this->doctrineRegistry->getManager();
        $repository = $this->doctrineRegistry->getRepository(Project::class);
        /** @var Project $project */
        $project = $repository->find($command->getId());
        $manager->remove($project);
        $manager->flush();
    }
}
