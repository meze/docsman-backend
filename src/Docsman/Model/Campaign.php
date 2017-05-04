<?php
declare(strict_types = 1);

namespace Docsman\Model;

use Docsman\Helper\DateTimeHelper;

final class Campaign
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Application
     */
    private $application;

    /**
     * @var int
     */
    private $sentCount = 0;

    /**
     * @var int
     */
    private $receivedCount = 0;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * Campaign constructor.
     *
     * @param Application $application
     */
    public function __construct(Application $application)
    {
        $this->application = $application;
        $this->createdAt = DateTimeHelper::getUtcNow();
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return Application
     */
    public function getApplication(): Application
    {
        return $this->application;
    }

    /**
     * @return int
     */
    public function getSentCount(): int
    {
        return $this->sentCount;
    }

    /**
     * @return int
     */
    public function getReceivedCount(): int
    {
        return $this->receivedCount;
    }

    public function trackReceived(): void
    {
        $this->receivedCount++;
    }

    public function trackSent(): void
    {
        $this->sentCount++;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function rename(string $name): void
    {
        $this->name = $name;
    }
}
