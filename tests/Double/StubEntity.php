<?php

namespace DDD\Test\Double;

use DDD\Domain\Entity;
use DDD\Domain\Value\Identity;

final class StubEntity extends Entity
{
    private string $internalData;

    public function __construct(Identity $id, string $internalData)
    {
        parent::__construct($id);
        $this->internalData = $internalData;
    }
}