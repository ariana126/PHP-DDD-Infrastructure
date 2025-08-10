<?php

namespace Symfony;

use Psr\Log\LoggerInterface;

final class Logger implements LoggerInterface
{
    private string $prefix;
    private LoggerInterface $logger;

    public function __construct(string $prefix, LoggerInterface $logger)
    {
        $this->prefix = $prefix;
        $this->logger = $logger;
    }

    public function emergency(\Stringable|string $message, array $context = []): void
    {
        $this->logger->emergency($this->wrapWithPrefix($message), $context);
    }

    public function alert(\Stringable|string $message, array $context = []): void
    {
        $this->logger->alert($this->wrapWithPrefix($message), $context);
    }

    public function critical(\Stringable|string $message, array $context = []): void
    {
        $this->logger->critical($this->wrapWithPrefix($message), $context);
    }

    public function error(\Stringable|string $message, array $context = []): void
    {
        $this->logger->error($this->wrapWithPrefix($message), $context);
    }

    public function warning(\Stringable|string $message, array $context = []): void
    {
        $this->logger->warning($this->wrapWithPrefix($message), $context);
    }

    public function notice(\Stringable|string $message, array $context = []): void
    {
        $this->logger->notice($this->wrapWithPrefix($message), $context);
    }

    public function info(\Stringable|string $message, array $context = []): void
    {
        $this->logger->info($this->wrapWithPrefix($message), $context);
    }

    public function debug(\Stringable|string $message, array $context = []): void
    {
        $this->logger->debug($this->wrapWithPrefix($message), $context);
    }

    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $this->logger->log($level, $this->wrapWithPrefix($message), $context);
    }

    private function wrapWithPrefix(string $message): string
    {
        return sprintf('%s: %s', $this->prefix, $message);
    }
}