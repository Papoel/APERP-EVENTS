<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;
use App\Entity\Classroom;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClassroomFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $classe = ['CP', 'CE1', 'CE2', 'CM1', 'CM2'];
        $iMax = count($classe) -1;

        for ($i = 0; $i <= $iMax; ++$i) {
            $classroom = new Classroom();

            $classroom->setName($classe[$i]);

            $manager->persist($classroom);

            $this->addReference(
                sprintf('classroom%d', $i), $classroom);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            TeacherFixtures::class,
        ];
    }
}
