<?php
declare(strict_types=1);
namespace AppBundle\Controller;

use Docsman\Core\Contract\ICommandDispatcher;
use Docsman\Core\Contract\IQueryDispatcher;
use Docsman\Service\TrackingService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

final class TrackingController extends Controller
{
    /**
     * @var TrackingService
     */
    private $trackingService;

    /**
     * Controller constructor.
     *
     * @param Serializer         $serializer
     * @param IQueryDispatcher   $queryDispatcher
     * @param ICommandDispatcher $commandDispatcher
     * @param EngineInterface    $templating
     * @param TrackingService    $trackingService
     */
    public function __construct(
        Serializer $serializer,
        IQueryDispatcher $queryDispatcher,
        ICommandDispatcher $commandDispatcher,
        EngineInterface $templating,
        TrackingService $trackingService)
    {
        parent::__construct($serializer, $queryDispatcher, $commandDispatcher, $templating);

        $this->trackingService = $trackingService;
    }

    public function indexAction(Request $request): TransparentImageResponse
    {
        $uniqueCode = $request->query->get('u');

        if ($uniqueCode !== null && strlen($uniqueCode) > 0) {
            $this->trackingService->markAsReceived($uniqueCode);
        }

        return new TransparentImageResponse();
    }
}
