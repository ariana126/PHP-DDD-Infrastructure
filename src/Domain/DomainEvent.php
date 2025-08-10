<?php

namespace DDD\Domain;

use DateTimeImmutable;
use JsonSerializable;

interface DomainEvent
{
    /**
     * @return DateTimeImmutable
     */
    public function occurredOn(): DateTimeImmutable;
}