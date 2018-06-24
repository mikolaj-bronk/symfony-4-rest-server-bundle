<?php

namespace Bronk\RestBundle\Repository;

use Bronk\RestBundle\Entity\Items;
use Bronk\RestBundle\Repository\Items\{
    Interfaces\ItemsStrategyInterface,
    ItemsStrategy
};
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Items|null find($id, $lockMode = null, $lockVersion = null)
 * @method Items|null findOneBy(array $criteria, array $orderBy = null)
 * @method Items[]    findAll()
 * @method Items[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Items::class);
    }

    public function findItemsWhere(string $mark, int $value = 0): array
    {
        return (new ItemsStrategy($mark, $this))->getItems($value);
    }

    public function findOneById($value): ?Items
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
