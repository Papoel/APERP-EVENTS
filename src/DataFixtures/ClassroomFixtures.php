<?php

namespace App\DataFixtures;

use App\Entity\Classroom;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ClassroomFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $classe = ['CP', 'CE1', 'CE2', 'CM1', 'CM2'];
        $iMax = count($classe);

        for ($i = 1; $i <= $iMax; ++$i) {
            $classroom = new Classroom();
            $classroom->setName($classe[$i]);
        }

        $manager->flush();
    }
}
