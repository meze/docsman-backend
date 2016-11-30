<?php
declare(strict_types = 1);
namespace AppBundle\ParamConverter;

use Docsman\Core\Contract\ICommand;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\SerializerInterface;

class JsonParamConverter implements ParamConverterInterface
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * JsonParamConverter constructor.
     *
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param Request        $request
     * @param ParamConverter $configuration
     */
    public function apply(Request $request, ParamConverter $configuration)
    {
        $class = $configuration->getClass();

        try {
            $object = $this->serializer->deserialize($request->getContent(), $class, 'json');
        } catch (ExceptionInterface $e) {
            throw new NotFoundHttpException("Could not deserialize a request to an object of class '{$class}' because: {$e->getMessage()}");
        }

        $request->attributes->set($configuration->getName(), $object);
    }

    /**
     * @param ParamConverter $configuration
     *
     * @return bool
     */
    public function supports(ParamConverter $configuration)
    {
        $class = $configuration->getClass();

        return !empty($class) && is_subclass_of($class, ICommand::class);
    }
}
