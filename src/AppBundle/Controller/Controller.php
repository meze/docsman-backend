<?php
declare(strict_types=1);
namespace AppBundle\Controller;

use Docsman\Core\Contract\ICommandDispatcher;
use Docsman\Core\Contract\IQueryDispatcher;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Serializer;

abstract class Controller
{
    /**
     * @var EngineInterface
     */
    private $templating;

    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * @var IQueryDispatcher
     */
    protected $queryDispatcher;

    /**
     * @var ICommandDispatcher
     */
    protected $commandDispatcher;

    /**
     * Controller constructor.
     *
     * @param Serializer         $serializer
     * @param IQueryDispatcher   $queryDispatcher
     * @param ICommandDispatcher $commandDispatcher
     * @param EngineInterface    $templating
     */
    public function __construct(Serializer $serializer, IQueryDispatcher $queryDispatcher, ICommandDispatcher $commandDispatcher, EngineInterface $templating)
    {
        $this->serializer = $serializer;
        $this->queryDispatcher = $queryDispatcher;
        $this->commandDispatcher = $commandDispatcher;
        $this->templating = $templating;
    }

    /**
     * @param string $view
     * @param array  $parameters
     *
     * @return Response
     */
    protected function render(string $view, array $parameters = []): Response
    {
        return $this->templating->renderResponse($view, $parameters, null);
    }

    /**
     * @param mixed $data
     *
     * @return JsonResponse
     */
    protected function json($data): JsonResponse
    {
        $json = $this->serializer->serialize($data, 'json', [
            'json_encode_options' => JsonResponse::DEFAULT_ENCODING_OPTIONS,
        ]);

        return new JsonResponse($json, 200, [], true);
    }
}
