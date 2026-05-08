<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public const USER_REF = 'user-ref';
    public const ADMIN_REF = 'admin-ref';

    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        //user
        $user = new User();
        $user->setEmail('user@example.com');
        $user->setRoles(['ROLE_USER']);

        $hashedUserPassword = $this->passwordHasher->hashPassword($user, 'mdp');
        $user->setPassword($hashedUserPassword);

        $manager->persist($user);
        $this->addReference(self::USER_REF, $user);

        //administrateur
        $admin = new User();
        $admin->setEmail('admin@example.com');
        $admin->setRoles(['ROLE_ADMIN']);

        $hashedAdminPassword = $this->passwordHasher->hashPassword($admin, 'mdp');
        $admin->setPassword($hashedAdminPassword);

        $manager->persist($admin);
        $this->addReference(self::ADMIN_REF, $admin);

        $manager->flush();
    }
}
