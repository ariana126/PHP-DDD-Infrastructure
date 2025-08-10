<?php

namespace DDD\Test\Unit\Domain\Value;
use Assert\AssertionFailedException;
use DDD\Domain\Value\Identity;
use PHPUnit\Framework\TestCase;

final class IdentityTest extends TestCase
{
    public function testAnEmptyIdCannotExists(): void
    {
        // arrange
        $emptyId = '';

        // assertion
        $this->expectException(AssertionFailedException::class);

        // act
        Identity::fromString($emptyId);
    }
}