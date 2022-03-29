<?php

namespace App\DataFixtures;

use App\Entity\Children;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ChildrenFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <= 350; $i++) {
            $children = new Children();
            $children->setFirstname($faker->firstName());
            $children->setLastname($faker->lastName());
            $children->setAge($faker->numberBetween(6, 10));
            $children->setIsExterne(false);

            $manager->persist($children);
        }

        $manager->flush();
    }
}
