<?php

namespace Symfony;

use DDD\Application\Command;

abstract class BaseCommand implements Command
{
    abstract public function name(): string;
    abstract public function toArray(): array;
}