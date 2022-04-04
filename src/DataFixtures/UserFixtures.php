<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        $userAdmin = new User();

        $userAdmin->setFirstname('Pascal');
        $userAdmin->setLastname('Briffard');
        $userAdmin->setAddress('12 rue des indécis');
        $userAdmin->setZip('59000');
        $userAdmin->setTown('Lille');
        $userAdmin-> setEmail("admin@email.fr");
        $userAdmin-> setRoles(["ROLE_ADMIN"]);
        $hash = $this->passwordHasher->hashPassword($userAdmin, ('password123'));
        $userAdmin->setPassword($hash);
        $userAdmin->setIsAdmin(true);
        $userAdmin->setTelephone($faker->mobileNumber());

        $manager->persist($userAdmin);

        for ($i = 1; $i<= 20; $i++) {
            $user = new User();
            $user->setFirstname($faker->firstName());
            $user->setLastname($faker->lastName());
            $user->setAddress($faker->streetAddress() );
            $user->setZip((string)$faker->randomNumber(5, true));
            $user->setTown($faker->city());
            $user-> setEmail(sprintf('user%d@email.fr', $i));
            $user-> setRoles(["ROLE_USER"]);
            $hash = $this->passwordHasher->hashPassword($user, ('password'));
            $user->setPassword($hash);
            $user->setIsAdmin(false);
            $user->setTelephone($faker->mobileNumber());

            $manager->persist($user);

            $this->addReference(sprintf('user%d', $i), $user);
        }
        $manager->flush();
    }
}
