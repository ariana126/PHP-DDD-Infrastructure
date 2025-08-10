<?php

namespace Domain\Service;

use DDD\Domain\AggregateRoot;

interface DomainEventDispatcher
{
    public function dispatchAggregateRootEvents(AggregateRoot $aggregateRoot): void;
}