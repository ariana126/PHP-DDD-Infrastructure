<?php

namespace DDD\Domain;

use DDD\Domain\Value\Identity;

abstract class Entity
{
    /**
     * @var Identity
     */
    protected Identity $id;

    /**
     * @param Identity $id
     */
    public function __construct(Identity $id)
    {
        $this->id = $id;
    }

    /**
     * @return Identity
     */
    public function id(): Identity
    {
        return $this->id;
    }

    /**
     * @param Entity $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return $this->id->equals($other->id());
    }
}