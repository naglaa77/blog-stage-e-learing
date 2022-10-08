<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Factory\UserFactory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        UserFactory::createOne([
            'email'=>'lubna.a@gmail.com',
            'roles' => ['ROLE_ADMIN'],
        ]);

        UserFactory::createOne([
            'email'=>'lubna.al@gmail.com',
        ]);

        UserFactory::createMany(2);

        $manager->flush();
    }
}
