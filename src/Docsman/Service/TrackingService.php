<?php
declare(strict_types = 1);

namespace Docsman\Service;

interface TrackingService
{
    /**
     * Check whether a tracked item is already marked as received
     *
     * If a hit is already registered as received we must not count it again.
     *
     * Unique Id is a UUID that was assigned to a tracked item.
     *
     * @param string $uniqueId
     * @return bool
     */
    public function isAlreadyReceived(string $uniqueId): bool;

    /**
     * Marks a unique code as received
     *
     * @param string $uniqueId
     */
    public function markAsReceived(string $uniqueId): void;

    /**
     * Adds a tracked item
     */
    public function add(): void;
}
