<?php

namespace DDD\Test\Unit\Domain;

use DDD\Domain\Value\Identity;
use DDD\Test\Double\DummyDomainEvent;
use DDD\Test\Double\StubAggregateRoot;
use PHPUnit\Framework\TestCase;

final class AggregateRootTest extends TestCase
{
    public function testAnAggregateRootDoNotReleaseSameDomainEventsTwice(): void
    {
        // arrange
        $sut = new StubAggregateRoot(Identity::fromString('dummy-id'));
        $event = new DummyDomainEvent();
        $sut->recordEvent($event);

        // act
        $sut->releaseEvents();

        // assert
        $this->assertEmpty($sut->releaseEvents());
    }
}