<?php

namespace DDD\Test\Double;

use DDD\Domain\AggregateRoot;
use DDD\Domain\DomainEvent;

final class StubAggregateRoot extends AggregateRoot
{
    public function recordEvent(DomainEvent $event): void
    {
        $this->recordThat($event);
    }
}