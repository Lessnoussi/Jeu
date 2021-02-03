<?php

namespace App\DataFixtures;

use App\Entity\Carte;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        for ($i=0; $i<=52; $i++) {
            $carte = new Carte();
            $carte->setCouleur(rand(0,count(Carte::COLOR)-1))
                ->setValeur(rand(0,count(Carte::VALEUR)-1));
            $manager->persist($carte);
        }

        $manager->flush();
    }
}
