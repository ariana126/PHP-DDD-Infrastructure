<?php

namespace Domain\Service;

use DDD\Domain\AggregateRoot;
use DDD\Domain\Error\AggregateRootNotFound;
use DDD\Domain\Value\Identity;

interface ReadRepository
{
    public function get(Identity $id): ?AggregateRoot;

    /**
     * @throws AggregateRootNotFound
     */
    public function getOrFail(Identity $id): AggregateRoot;
}