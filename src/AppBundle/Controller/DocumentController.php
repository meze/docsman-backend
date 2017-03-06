<?php
declare(strict_types = 1);
namespace AppBundle\Controller;

use Docsman\Application\Document\Command\SaveDocumentCommand;
use Docsman\Application\Document\Command\SoftRemoveDocumentCommand;
use Docsman\Application\Document\Query\FindAllDocumentsQuery;
use Docsman\Application\Document\Query\SingleDocumentQuery;
use Docsman\Application\Project\Query\SingleProjectQuery;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class DocumentController extends Controller
{
    public function indexAction(int $projectId): JsonResponse
    {
        $project = $this->queryDispatcher->dispatch(new SingleProjectQuery($projectId))->getResult();
        $documents = $this->queryDispatcher->dispatch(new FindAllDocumentsQuery($projectId))->getResult();

        return $this->json([
            'project'   => $project,
            'documents' => $documents
        ]);
    }

    public function viewAction(int $projectId, int $id): JsonResponse
    {
        $document = $this->queryDispatcher->dispatch(new SingleDocumentQuery($id))->getResult();

        return $this->json($document);
    }

    public function saveAction(SaveDocumentCommand $command): JsonResponse
    {
        $project = $this->queryDispatcher->dispatch(new SingleProjectQuery($command->getProjectId()))->getResult();

        if ($project === null) {
            throw new NotFoundHttpException("A project does not exist with id {$command->getProjectId()}");
        }

        $this->commandDispatcher->dispatch($command);

        $document = $this->queryDispatcher->dispatch(new SingleDocumentQuery($command->getId()))->getResult();

        return $this->json($document);
    }

    public function removeAction(int $documentId): JsonResponse
    {
        $this->commandDispatcher->dispatch(new SoftRemoveDocumentCommand($documentId));

        return $this->json($documentId);
    }
}
