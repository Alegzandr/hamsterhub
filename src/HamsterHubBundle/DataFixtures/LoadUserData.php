<?php

namespace HamsterHubBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EntityBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $userTest = new User();
        $userTest->setUsername('user');
        $userTest->setPassword('test');
        $userTest->setBirthdate('1990-01-01');

        $manager->persist($userTest);
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}