<?php

namespace DDD\Domain;

use DDD\Domain\Value\Identity;

abstract class AggregateRoot extends Entity
{
    /**
     * @var DomainEvent[]
     */
    private array $events = [];

    /**
     * @param Identity $id
     */
    public function __construct(Identity $id)
    {
        parent::__construct($id);
    }

    /**
     * @return DomainEvent[]
     */
    public function releaseEvents(): array
    {
        $events = $this->events;
        $this->events = [];
        return $events;
    }

    /**
     * @param DomainEvent $event
     * @return void
     */
    protected function recordThat(DomainEvent $event): void
    {
        $this->events[] = $event;
    }
}