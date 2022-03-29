<?php

namespace App\DataFixtures;

use App\Entity\Teacher;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TeacherFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $teacher1 = new Teacher();
        $teacher1->setFirstname('Marianne');
        $teacher1->setLastname('Flament');

        $manager->flush();
    }
}
