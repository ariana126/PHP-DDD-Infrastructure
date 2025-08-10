<?php

namespace Symfony;

use DDD\Application\QueryResult as QueryResultInterface;

final class QueryResult implements QueryResultInterface
{
    private mixed $data;

    private function __construct(mixed $data)
    {
        $this->data = $data;
    }

    public static function withNoData(): self
    {
        return new self(null);
    }

    public static function withData(mixed $data): self
    {
        return new self($data);
    }

    public function hasData(): bool
    {
        return !is_null($this->data);
    }
}