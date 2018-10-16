<?php

namespace App\DataFixtures;

use App\Services\UserService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixture extends Fixture
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function load(ObjectManager $manager)
    {
        $this->userService->newUser($manager,'admin',1111,'admin@admin.com','ROLE_ADMIN');
    }
}
