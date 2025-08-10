<?php

namespace DDD\Domain;

use ReflectionClass;

abstract class ValueObject
{
    /**
     * @param ValueObject $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        foreach ((new ReflectionClass($this))->getProperties() as $property) {
            $property->setAccessible(true);
            if ($property->getValue($this) !== $property->getValue($other)) {
                return false;
            }
        }
        return true;
    }
}