<?php

namespace App\DataFixtures;

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

        $manager->persist($userAdmin);

        $user = new User();

        $user->setFirstname('John');
        $user->setLastname('Doe');
        $user->setAddress('126 rue de Victor Hugo');
        $user->setZip('07000');
        $user->setTown('Cruas');
        $user-> setEmail("user@email.fr");
        $user-> setRoles(["ROLE_USER"]);
        $hash = $this->passwordHasher->hashPassword($user, ('password456'));
        $user->setPassword($hash);
        $user->setIsAdmin(true);

        $manager->persist($user);

        $manager->flush();
    }
}
