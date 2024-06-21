<?php

namespace App\Tests\Functionnel;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserRepoTest extends KernelTestCase
{
    public function testCont(): void
    {
        $kernel = self::bootKernel();

        $AllUsers = $kernel->getContainer()->get('doctrine')->getRepository(Users::class)->findAll();

        $this->assertCount(10, $AllUsers);




    }
}
