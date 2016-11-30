<?php
declare(strict_types = 1);
namespace Docsman\Application\Project\Command;

use Docsman\Application\DoctrineCommandHandler;
use Docsman\Core\Contract\ICommand;
use Docsman\Core\Contract\ICommandHandler;
use Docsman\Model\Project;

class SaveProjectCommandHandler extends DoctrineCommandHandler implements ICommandHandler
{
    /**
     * @param SaveProjectCommand $command
     *
     * @return void
     */
    public function execute(ICommand $command): void
    {
        $manager = $this->doctrineRegistry->getManager();

        $repository = $this->doctrineRegistry->getRepository(Project::class);

        if ($command->getId() > 0) {
            /** @var Project $project */
            $project = $repository->find($command->getId());
            $project->rename($command->getName());
        } else {
            $project = new Project($command->getName());
            $manager->persist($project);
        }

        $manager->flush();

        if ($command->getId() === 0) {
            $command->setId($project->getId());
        }
    }
}
