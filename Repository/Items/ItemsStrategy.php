<?php

namespace Bronk\RestBundle\Repository\Items;

use Bronk\RestBundle\Exceptions\ItemExpection;
use Bronk\RestBundle\Repository\ItemsRepository;
use Bronk\RestBundle\Repository\Items\Interfaces\ItemsStrategyInterface;
use Bronk\RestBundle\Repository\Items\ItemsConditions\{
    EqualTo,
    GreaterThan
};

class ItemsStrategy
{
    private $marks = [
        '>' => GreaterThan::class,
        '=' => EqualTo::class,
    ];

    private $strategy;

    public function __construct(string $mark, ItemsRepository $repo)
    {
        $className = $this->marks[$mark];

        if (class_exists($className) === false) {
            throw new ItemExpection('Given class name does not exist.');
        }

        $object = new $className($repo);

        if (!($object instanceof ItemsStrategyInterface)) {
            throw new ItemException('Object does not belongs to ItemsStrategyInterace.');
        }

        $this->strategy = new $className($repo);
    }

    public function getItems(int $value): array
    {
        return $this->strategy->getItems($value);
    }
}