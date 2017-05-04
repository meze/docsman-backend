<?php
declare(strict_types = 1);

namespace Docsman\Model;

final class Payload
{
    /**
     * Packs four positive or zero integers into one 32 bytes sequence of bytes. The range of integer values is
     * from 0 to 2147483647.
     *
     * appId identifies your application identifier. Other three 64-bits unsigned integers (field1, field2, field3)
     * contain any user-supplied values (for example, field1 may contain campaign identifier, field2 a sender
     * identifier, and field3 the type of a tracked item).
     *
     * @param int $appId the application id
     * @param int $field1 user-supplied value
     * @param int $field2 user-supplied value
     * @param int $field3 user-supplied value
     *
     * @return string a binary string
     */
    public static function pack(int $appId, int $field1, int $field2, int $field3): string
    {
        return pack('J*', $appId, $field1, $field2, $field3);
    }

    /**
     * Unpacks a binary string into 4 integers.
     *
     * @param string $payload
     *
     * @return array an array with four elements (appId, field1, field2, field3)
     */
    public static function unpack(string $payload): array
    {
        return unpack('JappId/Jfield1/Jfield2/Jfield3', $payload);
    }
}
