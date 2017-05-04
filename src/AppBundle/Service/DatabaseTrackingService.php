<?php
declare(strict_types = 1);

namespace AppBundle\Service;

use Docsman\Service\TrackingService;

class DatabaseTrackingService implements TrackingService
{
    /**
     * @inheritdoc
     */
    public function isAlreadyReceived(string $uniqueId): bool
    {
        // TODO: Implement isAlreadyReceived() method.
    }

    /**
     * @inheritdoc
     */
    public function markAsReceived(string $uniqueId): void
    {
        // check if is already registered
        // add to tracking as open


        throw new \Exception('Not Impled');
        // TODO: Implement markAsReceived() method.
    }

    /**
     * @inheritdoc
     */
    public function add(): void
    {
        // TODO: Implement add() method.
    }
}
