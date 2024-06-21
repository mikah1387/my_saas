<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UsersFixtures extends Fixture
{

    private $passwordHacher;
    public function __construct(UserPasswordHasherInterface $passwordHacher)
    
    {
        $this->passwordHacher = $passwordHacher;
    }
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i <10 ; $i++) { 
            
            $user= new Users();

            $user->setFirstname('Firstname'.$i)
                 ->setLastname('Lastname'.$i)
                 ->setAdresse('Adresse'.$i)
                 ->setCodecity('1300'.$i)
                 ->setEmail('email'.$i.'@gmail.com')    
                 ->setPassword($this->passwordHacher->hashPassword($user, 'password'))
                 ->setRoles(['ROLE_USER']);
        $manager->persist($user);


        }

        $manager->flush();
    }
}
