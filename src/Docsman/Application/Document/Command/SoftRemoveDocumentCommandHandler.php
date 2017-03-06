<?php
declare(strict_types = 1);
namespace Docsman\Application\Document\Command;

use Docsman\Application\DoctrineCommandHandler;
use Docsman\Core\Contract\ICommand;
use Docsman\Core\Contract\ICommandHandler;
use Docsman\Model\Document;

class SoftRemoveDocumentCommandHandler extends DoctrineCommandHandler implements ICommandHandler
{
    /**
     * @param SoftRemoveDocumentCommand|ICommand $command
     *
     * @return void
     * @throws \InvalidArgumentException
     */
    public function execute(ICommand $command): void
    {
        $manager = $this->doctrineRegistry->getManager();
        $documentRepository = $this->doctrineRegistry->getRepository(Document::class);

        /** @var Document $document */
        $document = $documentRepository->find($command->getId());
        $document->softRemove();

        $manager->flush();
    }
}
