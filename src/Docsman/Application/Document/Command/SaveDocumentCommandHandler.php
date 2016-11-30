<?php
declare(strict_types = 1);
namespace Docsman\Application\Document\Command;

use Docsman\Application\DoctrineCommandHandler;
use Docsman\Core\Contract\ICommand;
use Docsman\Core\Contract\ICommandHandler;
use Docsman\Model\Document;
use Docsman\Model\Project;

class SaveDocumentCommandHandler extends DoctrineCommandHandler implements ICommandHandler
{
    /**
     * @param SaveDocumentCommand $command
     *
     * @return void
     */
    public function execute(ICommand $command): void
    {
        $manager = $this->doctrineRegistry->getManager();
        $documentRepository = $this->doctrineRegistry->getRepository(Document::class);
        $projectRepository = $this->doctrineRegistry->getRepository(Project::class);

        /** @var Project $project */
        $project = $projectRepository->findOneBy([
            'id' => $command->getProjectId()
        ]);

        if ($command->getId() > 0) {
            /** @var Document $document */
            $document = $documentRepository->find($command->getId());
            $document->setContent($command->getContent());
            $document->rename($command->getName());
        } else {
            $document = new Document($project, $command->getName(), $command->getContent());
            $manager->persist($document);
        }

        $manager->flush();

        if ($command->getId() === 0) {
            $command->setId($document->getId());
        }
    }
}
