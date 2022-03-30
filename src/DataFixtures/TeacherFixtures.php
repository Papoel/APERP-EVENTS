<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Teacher;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TeacherFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <= 5; ++$i) {
            $teacher = new Teacher();

            $teacher->setFirstname($faker->firstName());
            $teacher->setLastname($faker->lastName());

            $manager->persist($teacher);

            $this->addReference(sprintf('teacher%d', $i), $teacher);
        }

        $manager->flush();

    }
}
