<?php

namespace App\DataFixtures;

use App\Entity\Stuff;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i=0; $i<100; $i++){
            $stuff = new Stuff();
            $stuff->setName(substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"),0,8));
            $stuff->setPower(rand(1,10000));
            $stuff->setDescription(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz-:,"),0,32));
            $manager->persist($stuff);
        }
        $manager->flush();
    }
}
