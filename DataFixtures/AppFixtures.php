<?php

namespace Bronk\RestBundle\DataFixtures;

use Bronk\RestBundle\Entity\Items;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $itemsArray = [
            ['name' => 'Produkt 1', 'amount' => 4 ],
            ['name' => 'Produkt 2', 'amount' => 12 ],
            ['name' => 'Produkt 5', 'amount' => 0 ],
            ['name' => 'Produkt 7', 'amount' => 6 ],
            ['name' => 'Produkt 8', 'amount' => 2 ]
        ];

        foreach ($itemsArray as $item) {
            $itemObject = new Items();
            $itemObject->setName($item['name']);
            $itemObject->setAmount($item['amount']);
            $manager->persist($itemObject);
        }

        $manager->flush();
    }
}
