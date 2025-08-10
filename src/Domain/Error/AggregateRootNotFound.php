<?php

namespace DDD\Domain\Error;

use DDD\Domain\Value\Identity;

final class AggregateRootNotFound extends DomainException
{
    /**
     * @param string $message
     */
    private function __construct(string $message = "")
    {
        parent::__construct($message);
    }

    /**
     * @param Identity $id
     * @return self
     */
    public static function withId(Identity $id): self
    {
        return new self(sprintf('Aggregate root with id "%s" not found.', $id->toString()));
    }
}