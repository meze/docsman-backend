<?php
declare(strict_types = 1);

namespace Docsman\Model;

use Docsman\Helper\DateTimeHelper;

final class Tracking
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var Campaign
     */
    private $campaign;

    /**
     * @var string
     */
    private $signature;

    /**
     * @var int
     */
    private $field1 = 0;

    /**
     * @var int
     */
    private $field2 = 0;

    /**
     * @var int
     */
    private $field3 = 0;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * Tracking constructor.
     *
     * @param Campaign $campaign
     * @param string   $signature
     */
    public function __construct(Campaign $campaign, string $signature)
    {
        $this->campaign = $campaign;
        $this->signature = $signature;
        $this->createdAt = DateTimeHelper::getUtcNow();
    }

    /**
     * @param int $field1
     * @param int $field2
     * @param int $field3
     */
    public function setFields(int $field1, int $field2, int $field3): void
    {
        $this->field1 = $field1;
        $this->field2 = $field2;
        $this->field3 = $field3;
    }

    /**
     * @return Campaign
     */
    public function getCampaign(): Campaign
    {
        return $this->campaign;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getSignature(): string
    {
        return $this->signature;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
