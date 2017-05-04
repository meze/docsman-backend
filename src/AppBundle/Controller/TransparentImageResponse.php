<?php
declare(strict_types = 1);
namespace AppBundle\Controller;

use Docsman\Service\ImageService;
use Symfony\Component\HttpFoundation\Response;

class TransparentImageResponse extends Response
{
    public function __construct()
    {
        parent::__construct(ImageService::createTransparent(), 200, [
            'Content-Type' => 'image/gif'
        ]);
        $this->setPrivate();
        $this->headers->addCacheControlDirective('no-cache', true);
        $this->headers->addCacheControlDirective('must-revalidate', true);
    }
}
