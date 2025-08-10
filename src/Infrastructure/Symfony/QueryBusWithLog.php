<?php

namespace Symfony;

use DDD\Application\Query;
use DDD\Application\QueryHandler;
use DDD\Application\QueryResult;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Symfony\Contracts\EventDispatcher\MessageBusInterface;

final class QueryBusWithLog implements QueryHandler
{
    private LoggerInterface $logger;
    private MessageBusInterface $bus;

    public function __construct(LoggerInterface $logger, MessageBusInterface $bus)
    {
        $this->logger = $logger;
        $this->bus = $bus;
    }

    public function execute(Query $query): QueryResult
    {
        $this->logger->info(sprintf('Query "%s" received.', $query->name()), ['queryData' => $query->toArray()]);
        $envelope = $this->bus->dispatch($query);
        $handled = $envelope->last(HandledStamp::class);
        $result = $handled?->getResult();
        if (is_null($result)) {
            return \Symfony\QueryResult::withNoData();
        }
        return \Symfony\QueryResult::withData($result);
    }
}