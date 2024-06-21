<?php

namespace App\Tests\Entity;

use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UsersEntityTest extends KernelTestCase
{

     public function getEntity(): Users
     {

         $user = new Users();
         $user->setFirstname('halim')
             ->setLastname('boussouk')
             ->setEmail('oCJQ5@example.com')
             ->setPassword('123456789')
             ->setAdresse('tunis')
             ->setCodecity('1234');

         return $user;
     }
    public function testValidEntity(): void
    {
        $kernel = self::bootKernel();
        $container = static::getContainer();
        $errors = $container->get('validator')->validate($this->getEntity());
        $this->assertCount(1, $errors);


    }
}
