<?php

namespace App\DataFixtures;

use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Faker;
use App\Entity\Level;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LevelFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');
        $classe = ['CP', 'CE1', 'CE2', 'CM1', 'CM2'];
        $iMax = count($classe) -1;

        for ($i = 0; $i <= $iMax; ++$i) {
            $level = new Level();
            $level->setName($classe[$i]);

            $level->setTeacher(
                $this->getReference(sprintf('teacher%d', $faker->numberBetween(1, 5)))
            );

            $manager->persist($level);

            $this->addReference(
                sprintf('level%d', $i), $level);
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
