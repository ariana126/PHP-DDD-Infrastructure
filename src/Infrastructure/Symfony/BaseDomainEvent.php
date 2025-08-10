<?php

namespace Symfony;

use DDD\Domain\DomainEvent;

abstract class BaseDomainEvent implements DomainEvent
{
    abstract public function name(): string;
}