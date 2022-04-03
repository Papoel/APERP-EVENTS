<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\Students;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StudentsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <= 50; $i++) {
            $student = new Students();
            $student->setFirstname($faker->firstName());
            $student->setLastname($faker->lastName());
            $student->setAge($faker->numberBetween(6, 10));
            $student->setIsExterne(false);

            $student->setTeacher(
                $this->getReference(sprintf('teacher%d', $faker->numberBetween(1, 5)))
            );

            $student->setLevel(
                $this->getReference(sprintf('level%d', $faker->numberBetween(1, 4)))
            );

            $student->addUser(
                $this->getReference(sprintf('user%d', $faker->numberBetween(1, 20)))
            );

            $manager->persist($student);

//            $this->addReference(sprintf('student%d', $i), $student);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            LevelFixtures::class,
            TeacherFixtures::class,
            UserFixtures::class,
        ];
    }
}
