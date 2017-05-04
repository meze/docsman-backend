<?php
declare(strict_types = 1);
namespace Tests\Docsman\Service;

use Docsman\Service\ImageService;

class ImageServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testGeneratesAnEmptyImage(): void
    {
        $image = ImageService::createTransparent();

        $this->assertEquals(43, strlen($image));
    }

    public function testImageIsValidGif(): void
    {
        if (!extension_loaded('exif')) {
            $this->markTestSkipped(
                'The exif extension is not available.'
            );
        } else {
            $image = ImageService::createTransparent();
            $tempFile = tempnam(sys_get_temp_dir(), 'imageservicetest');
            file_put_contents($tempFile, $image);

            try {
                $type = exif_imagetype($tempFile);
            } finally {
                unlink($tempFile);
            }

            $this->assertEquals(\IMAGETYPE_GIF, $type);
        }
    }
}
