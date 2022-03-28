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
        $user = new User();

        $user->setFirstname('Pascal');
        $user->setLastname('Briffard');
        $user->setAddress('12 rue des indécis');
        $user->setZip('59000');
        $user->setTown('Lille');
        $user-> setEmail("admin@admin.fr");
        $user-> setRoles(["ROLE_ADMIN"]);
        $hash = $this->passwordHasher->hashPassword($user, ('password'));
        $user->setPassword($hash);
        $user->setIsAdmin(true);

        $manager->persist($user);
        $manager->flush();
    }
}
