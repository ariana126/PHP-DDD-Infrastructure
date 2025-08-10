<?php

namespace DDD\Domain\Value;

use Assert\Assertion;
use Assert\AssertionFailedException;
use DDD\Domain\ValueObject;

/**
 *
 */
final class Identity extends ValueObject
{
    /**
     * @var string
     */
    private string $id;

    /**
     * @param string $id
     * @throws AssertionFailedException
     */
    private function __construct(string $id)
    {
        Assertion::notBlank($id);
        $this->id = $id;
    }

    /**
     * @param string $id
     * @return self
     */
    public static function fromString(string $id): self
    {
        return new self($id);
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return $this->id;
    }
}
