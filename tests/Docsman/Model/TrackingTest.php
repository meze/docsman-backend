<?php
declare(strict_types = 1);
namespace Tests\Docsman\Model;

use Docsman\Model\Application;
use Docsman\Model\Tracking;

class TrackingTest extends \PHPUnit_Framework_TestCase
{
    public function testHasNoTrackingInfo(): void
    {
        $trackingResult = new Tracking(new Application(1));

        $this->assertEquals(0, $trackingResult->getReceivedCount());
        $this->assertEquals(0, $trackingResult->getSentCount());
    }

    public function testRegistersSentReminder(): void
    {
        $trackingResult = new Tracking(new Application(1));
        $trackingResult->trackSent();

        $this->assertEquals(1, $trackingResult->getSentCount());
    }

    public function testRegistersReceivedReminder(): void
    {
        $trackingResult = new Tracking(new Application(1));
        $trackingResult->trackReceived();

        $this->assertEquals(1, $trackingResult->getReceivedCount());
    }
}
