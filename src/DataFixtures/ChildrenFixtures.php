<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Children;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ChildrenFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <= 50; $i++) {
            $children = new Children();
            $children->setFirstname($faker->firstName());
            $children->setLastname($faker->lastName());
            $children->setAge($faker->numberBetween(6, 9));
            $children->setIsExterne($faker->boolean());
        }

        $manager->flush();
    }
}
