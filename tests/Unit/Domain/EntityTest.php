<?php

namespace DDD\Test\Unit\Domain;

use DDD\Domain\Value\Identity;
use DDD\Test\Double\StubEntity;
use PHPUnit\Framework\TestCase;

final class EntityTest extends TestCase
{
    public function testTwoEntitiesAreEqualByTheirIds(): void
    {
        // arrange
        $id = Identity::fromString('dummy-id');
        $sut = new StubEntity($id, 'dummy-data');
        $anotherEntity = new StubEntity($id, 'dummy-data');

        // act
        $isEqual = $sut->equals($anotherEntity);

        // assert
        $this->assertTrue($isEqual);
    }

    public function testInternalDataDoNotAffectEqualityOfTwoEntitiesWhenTheyHaveTheSameId(): void
    {
        // arrange
        $id = Identity::fromString('dummy-id');
        $sut = new StubEntity($id, 'dummy-data-1');
        $anotherEntity = new StubEntity($id, 'dummy-data-2');

        // act
        $isEqual = $sut->equals($anotherEntity);

        // assert
        $this->assertTrue($isEqual);
    }

    public function testTwoEntitiesAreNotEqualIfTheyHaveTwoDifferentIdsButSameInternalData(): void
    {
        // arrange
        $id1 = Identity::fromString('dummy-id-1');
        $id2 = Identity::fromString('dummy-id-2');
        $internalData = 'dummy-data';
        $sut = new StubEntity($id1, $internalData);
        $anotherEntity = new StubEntity($id2, $internalData);

        // act
        $isEqual = $sut->equals($anotherEntity);

        // assert
        $this->assertFalse($isEqual);
    }
}