<?php

namespace Symfony;

use DDD\Domain\AggregateRoot;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
/*
 * Be aware that, by default, the Symfony event dispatcher works synchronously.
 * As a result, if you use this implementation and the Doctrine base repository class written in this package,
 *  an exception in one listener might cause the whole transaction to be rolled back.
 */
class DomainEventDispatcher implements \DDD\Domain\Service\DomainEventDispatcher
{
    /**
     * @var EventDispatcherInterface
     */
    private EventDispatcherInterface $bus;

    /**
     * @param EventDispatcherInterface $bus
     */
    public function __construct(EventDispatcherInterface $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @param AggregateRoot $aggregateRoot
     * @return void
     */
    public function dispatchAggregateRootEvents(AggregateRoot $aggregateRoot): void
    {
        foreach ($aggregateRoot->releaseEvents() as $domainEvent) {
            assert($domainEvent instanceof BaseDomainEvent);
            $this->bus->dispatch($domainEvent, $domainEvent->name());
        }
    }
}