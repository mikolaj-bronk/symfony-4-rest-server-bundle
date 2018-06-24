<?php

namespace Bronk\RestBundle\Repository\Items\Interfaces;

use Doctrine\ORM\EntityRepository;

interface ItemsStrategyInterface
{
    public function getItems(int $value): array;
}
