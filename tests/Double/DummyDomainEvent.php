<?php

namespace DDD\Test\Double;
use DateTimeImmutable;
use DDD\Domain\DomainEvent;

final class DummyDomainEvent implements DomainEvent
{
    public function occurredOn(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }
}