<?php

namespace Symfony;

use DDD\Application\Command;
use DDD\Application\CommandHandler;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\EventDispatcher\MessageBusInterface;

final class CommandBusWithLog implements CommandHandler
{
    private LoggerInterface $logger;
    private MessageBusInterface $bus;

    public function __construct(LoggerInterface $logger, MessageBusInterface $bus)
    {
        $this->logger = $logger;
        $this->bus = $bus;
    }

    public function execute(Command $command): void
    {
        assert($command instanceof BaseCommand);
        $this->logger->info(sprintf('Command "%s" received.', $command->name()), ['commandData' => $command->toArray()]);
        $this->bus->dispatch($command, $command->name());
        $this->logger->info(sprintf('Command "%s" was dispatched.', $command->name()), ['commandData' => $command->toArray()]);
    }
}