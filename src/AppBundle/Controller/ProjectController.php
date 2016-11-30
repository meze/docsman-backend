<?php
declare(strict_types=1);
namespace AppBundle\Controller;

use Docsman\Application\Project\Command\RemoveProjectCommand;
use Docsman\Application\Project\Command\SaveProjectCommand;
use Docsman\Application\Project\Query\FindAllProjectsQuery;
use Docsman\Application\Project\Query\SingleProjectQuery;
use Symfony\Component\HttpFoundation\JsonResponse;

final class ProjectController extends Controller
{
    public function indexAction(): JsonResponse
    {
        $query = new FindAllProjectsQuery();
        $result = $this->queryDispatcher->dispatch($query)->getResult();

        return $this->json($result);
    }

    public function saveAction(SaveProjectCommand $command): JsonResponse
    {
        $this->commandDispatcher->dispatch($command);
        $project = $this->queryDispatcher->dispatch(new SingleProjectQuery($command->getId()))->getResult();

        return $this->json($project);
    }

    public function viewAction(int $id): JsonResponse
    {
        $project = $this->queryDispatcher->dispatch(new SingleProjectQuery($id))->getResult();

        return $this->json($project);
    }

    public function renameAction(SaveProjectCommand $command): JsonResponse
    {
        $this->commandDispatcher->dispatch($command);
        $project = $this->queryDispatcher->dispatch(new SingleProjectQuery($command->getId()))->getResult();

        return $this->json($project);
    }

    public function removeAction(int $projectId): JsonResponse
    {
        $this->commandDispatcher->dispatch(new RemoveProjectCommand($projectId));

        return $this->json($projectId);
    }
}
