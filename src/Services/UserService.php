<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 12.10.18
 * Time: 17:04
 */

namespace App\Services;

use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserService
{
    /**
     * UserPasswordEncoderInterface $encoder
     */
    private $encoder;

    /**
     * UserService constructor.
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(
        UserPasswordEncoderInterface $encoder
    )
    {
        $this->encoder = $encoder;
    }

    /**
     * @param ObjectManager $manager
     * @param string $name
     * @param string $password
     * @param string $email
     * @param string $role
     */
    public function newUser
    (
        ObjectManager $manager,
        string $name,
        string $password,
        string $email,
        string $role
    )
    {
        $user = new User();
        $user->setEmail($email);
        $user->setName($name);
        $user->setPassword(
            $this->encoder->encodePassword($user, $password)
        );
        $user->setRole($role);

        $manager->persist($user);
        $manager->flush();
    }

}