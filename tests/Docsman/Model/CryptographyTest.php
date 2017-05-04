<?php
declare(strict_types = 1);
namespace Tests\Docsman\Model;

use Docsman\Model\Cryptography;
use Docsman\Model\Payload;

class CryptographyTest extends \PHPUnit_Framework_TestCase
{
    public function testDecryptingString()
    {
        // encoded string 'hello world' with the key 'abc'
        $message = 'kbUD5jSSNZvs9/89hHzMCfwpnDUzUiAdRNx2';
        $string = Cryptography::decrypt($message, 'abc', true);

        $this->assertEquals('hello world', $string);
    }

    public function testEncryptDecryptPayload()
    {
        $key = 'key';
        $payload = new Payload();
        $message = Cryptography::encrypt($payload->pack(11, 22,33, 44), $key, true);
        $decoded = Cryptography::decrypt($message, $key, true);
        $result = $payload->unpack($decoded);

        $this->assertEquals(11, $result['appId']);
    }
}
