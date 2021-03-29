<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Information;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $information = new Information();
            $information->setName($faker->text(20));
            $information->setDetails($faker->text(255));
            $manager->persist($information);
        }
        $manager->flush();
    }
}
