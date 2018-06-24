<?php

namespace App\Repository\Items;

use Bronk\RestBundle\Repository\ItemsRepository;

abstract class ItemsAbstract
{
    protected $repo;

    public function __construct(ItemsRepository $repo)
    {
        $this->repo = $repo;
    }
}