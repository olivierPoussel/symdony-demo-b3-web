<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    /** @var UserPasswordEncoderInterface */
    private $userPasswordEncoder;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('user@ex.com');
        $user->setPassword($this->userPasswordEncoder->encodePassword($user, 'user'));

        $manager->persist($user);

        $admin = new User();
        $admin->setEmail('admin@ex.com');
        $admin->setPassword($this->userPasswordEncoder->encodePassword($admin, 'admin'));
        $admin->setRoles(["ROLE_ADMIN"]);
        $manager->persist($admin);

        $manager->flush();
    }
}
