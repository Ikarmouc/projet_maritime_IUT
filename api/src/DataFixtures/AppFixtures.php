<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Musee;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $musee = new Musee();
        $musee->setId(1);
        $musee->setAddresse("Place Bernard Moitessier");
        $musee->setVille("LaRochelle");
        $musee->setJoursFermeture("Covid -> fermé jusqu'a nouvel ordre");
        $musee->setHoraireOuverture(9);
        $musee->setHoraireFermeture(23);
        $musee->setImage("museeLaRochelle.jpg");
        $manager->persist($musee);

        $manager->flush();
    }
}
