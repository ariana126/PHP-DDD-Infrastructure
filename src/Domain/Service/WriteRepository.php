<?php

namespace Domain\Service;

use DDD\Domain\AggregateRoot;

interface WriteRepository
{
    public function save(AggregateRoot  $aggregateRoot): void;
}