<?php

namespace DDD\Domain\Service;

use DDD\Domain\AggregateRoot;

interface WriteRepository
{
    public function save(AggregateRoot  $aggregateRoot): void;
}