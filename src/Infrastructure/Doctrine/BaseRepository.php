<?php

use DDD\Domain\AggregateRoot;
use DDD\Domain\Error\AggregateRootNotFound;
use DDD\Domain\Value\Identity;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Domain\Service\DomainEventDispatcher;
use Domain\Service\Repository;

// TODO: Write a test
class BaseRepository extends EntityRepository implements Repository
{
    private DomainEventDispatcher $domainEventDispatcher;

    /**
     * @param EntityManagerInterface $em
     * @param ClassMetadata $class
     * @param DomainEventDispatcher $domainEventDispatcher
     */
    public function __construct(EntityManagerInterface $em, ClassMetadata $class, DomainEventDispatcher $domainEventDispatcher)
    {
        parent::__construct($em, $class);
        $this->domainEventDispatcher = $domainEventDispatcher;
    }

    /**
     * @param AggregateRoot $aggregateRoot
     * @return void
     * @throws Throwable
     * @throws \Doctrine\DBAL\Exception
     */
    public function save(AggregateRoot $aggregateRoot): void
    {
        $operation = function () use ($aggregateRoot): void {
            $entityManager = $this->getEntityManager();
            $entityManager->persist($aggregateRoot);
            $entityManager->flush();
            $this->domainEventDispatcher->dispatchAggregateRootEvents($aggregateRoot);
        };
        $this->executeInATransaction($operation->bindTo($this));
    }

    /**
     * @param Identity $id
     * @return AggregateRoot|null
     */
    public function get(Identity $id): ?AggregateRoot
    {
        return $this->find($id->toString());
    }

    /**
     * @param Identity $id
     * @return AggregateRoot
     * @throws AggregateRootNotFound
     */
    public function getOrFail(Identity $id): AggregateRoot
    {
        $aggregateRoot = $this->get($id);
        if (is_null($aggregateRoot)) {
            throw AggregateRootNotFound::withId($id);
        }
        return $aggregateRoot;
    }

    /**
     * @param callable $operation
     * @return void
     * @throws Throwable
     * @throws \Doctrine\DBAL\Exception
     */
    private function executeInATransaction(callable $operation): void
    {
        $entityManager = $this->getEntityManager();
        $entityManager->getConnection()->beginTransaction();
        try {
            $operation();
            $entityManager->getConnection()->commit();
        } catch (Throwable $exception) {
            $entityManager->getConnection()->rollBack();
            throw $exception;
        }
    }
}