<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    // ...
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('root');
        $user->setEmail('root@root.com');
        $user->setRoles(['ROLE_SUPERADMIN']);
        $user->setPassword($this->encoder->encodePassword($user, 'root'));
        $manager->persist($user);

        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin@admin.com');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setPassword($this->encoder->encodePassword($user, 'admin'));
        $manager->persist($user);

        $user = new User();
        $user->setUsername('user');
        $user->setEmail('user@user.com');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($this->encoder->encodePassword($user, 'user'));
        $manager->persist($user);

        $manager->flush();
    }
}
