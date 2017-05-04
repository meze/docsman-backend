<?php
declare(strict_types = 1);
namespace Tests\Docsman\Model;

use Docsman\Model\Payload;

class PayloadTest extends \PHPUnit_Framework_TestCase
{
    public function testPayloadPacking()
    {
        $payload = new Payload();

        $this->assertEquals(32, strlen($payload->pack(1, 2, 3, 4)));
    }

    public function testPayloadUnpacking()
    {
        $payload = new Payload();
        $packed = $payload->pack(1, 2, 3, 4);
        $unpacked = $payload->unpack($packed);

        $this->assertEquals([
            'appId' => 1,
            'field1' => 2,
            'field2' => 3,
            'field3' => 4], $unpacked);
    }
}
