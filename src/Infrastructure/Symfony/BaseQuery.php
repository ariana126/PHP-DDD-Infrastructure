<?php

namespace Symfony;

use DDD\Application\Query;

abstract class BaseQuery implements Query
{
    abstract public function name(): string;
    abstract public function toArray(): array;
}