<?php
declare(strict_types = 1);
namespace Docsman\Service;

final class ImageService
{
    /**
     * @return string
     */
    public static function createTransparent(): string
    {
        return base64_decode('R0lGODlhAQABAJAAAP8AAAAAACH5BAUQAAAALAAAAAABAAEAAAICBAEAOw==');
    }
}
