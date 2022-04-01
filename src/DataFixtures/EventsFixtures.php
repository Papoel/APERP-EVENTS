<?php

namespace App\DataFixtures;

use App\Entity\Events;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EventsFixtures extends Fixture
{
    /**
     * @throws \Exception
     */
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 1; $i <= 20; $i++) {

            $event = new Events();

            $event->setName($faker->sentence(5));
            $event->setLocation($faker->secondaryAddress());
            $event->setPrice($faker->randomFloat(1, 0.5, 15));
            $event->setCapacity($faker->numberBetween(10, 150));
            $event->setDescription($faker->realTextBetween($minNbChars = 80, $maxNbChars = 500, $indexSize = 2));
            $event->setImage($faker->imageUrl(640, 480, 'animals', true));

            $dateStart  = new \DateTimeImmutable('-1 year');
            $dateFinish = new \DateTimeImmutable('-1 month');


            $event->setStartsAt($dateStart);
            $event->setFinishAt($dateFinish);

            $manager->persist($event);

        }

        $manager->flush();
    }
}
