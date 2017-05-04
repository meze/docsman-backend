<?php
declare(strict_types = 1);

namespace Docsman\Helper;

final class DateTimeHelper
{
    public static function getUtcNow(): \DateTime
    {
        return new \DateTime('now', new \DateTimeZone('UTC'));
    }
}
