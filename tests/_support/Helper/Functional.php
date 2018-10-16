<?php
namespace App\Tests\Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Codeception\Exception\ModuleException;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Functional extends \Codeception\Module
{
    /**
     * @return ContainerInterface
     *
     * @throws ModuleException
     */
    public function getContainer(): ContainerInterface
    {
        return $this->getModule('Symfony')->kernel->getContainer();
    }

    public function getService(string $serviceId)
    {
        return $this->getContainer()->get($serviceId);
    }
}
