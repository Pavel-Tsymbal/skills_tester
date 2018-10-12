<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixture extends Fixture
{
    private $encoder;


    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }


    public function load(ObjectManager $manager)
    {
         $user = new User();
         $user->setLogin('admin');
         $user->setEmail('admin@mail.ru');
         $user->setName('Pavel');
         $user->setPassword(
             $this->encoder->encodePassword($user,'1111')
         );

         $manager->persist($user);

        $manager->flush();
    }
}
