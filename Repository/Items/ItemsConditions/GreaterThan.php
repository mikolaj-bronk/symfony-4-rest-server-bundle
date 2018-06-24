<?php

namespace Bronk\RestBundle\Repository\Items\ItemsConditions;

use Bronk\RestBundle\Repository\Items\{
    Interfaces\ItemsStrategyInterface,
    ItemsAbstract
};
use Doctrine\ORM\EntityRepository;

class GreaterThan extends ItemsAbstract implements ItemsStrategyInterface
{
    public function getItems(int $value): array
    {
        return $this->repo->createQueryBuilder('i')
            ->andWhere('i.amount > :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult();
    }
}
