<?php

namespace App\DataFixtures;

use App\Entity\Bateau;
use App\Entity\HistoireBateau;
use App\Entity\LocalisationBateau;
use App\Entity\Musee;
use App\Entity\PlanningVisite;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $musee = new Musee();
        $musee->setAddresse("Place Bernard Moitessier");
        $musee->setVille("La rochelle");
        $musee->setJoursFermeture("Covid -> fermé jusqu'a nouvel ordre");
        $musee->setHoraireOuverture(9);
        $musee->setHoraireFermeture(23);
        $manager->persist($musee);


        $bateau1 = new Bateau();
        $bateau1->setNom("France 1");
        $bateau1->setType("Navire météorologique stationnaire");
        $bateau1->setMateriau("Acier");
        $bateau1->setPrixAchat(1200000);
        $bateau1->setLongueur(76.2);
        $bateau1->setLargeur(12.5);
        $bateau1->setPoids(1381);
        $bateau1->setCapacitePersonne(10);
        $manager->persist($bateau1);

        $bateau2 = new Bateau();
        $bateau2->setNom("Saint Gilles");
        $bateau2->setType("Remorqueur portuaire et de haute mer");
        $bateau2->setMateriau("Acier");
        $bateau2->setPrixAchat(150000);
        $bateau2->setLongueur(30.30);
        $bateau2->setLargeur(7.92);
        $bateau2->setPoids(182.69);
        $bateau2->setCapacitePersonne(10);
        $manager->persist($bateau2);

        $bateau2 = new Bateau();
        $bateau2->setNom("Saint Gilles");
        $bateau2->setType("Remorqueur portuaire et de haute mer");
        $bateau2->setMateriau("Acier");
        $bateau2->setPrixAchat(150000);
        $bateau2->setLongueur(30.30);
        $bateau2->setLargeur(7.92);
        $bateau2->setPoids(182.69);
        $bateau2->setCapacitePersonne(10);
        $manager->persist($bateau2);

        $histoireBateau1 = new HistoireBateau();
        $histoireBateau1->setAnneeLancement(\DateTime::createFromFormat('Y',"1958"));
        $histoireBateau1->setConstructeur("Forges et Chantiers de la Méditerranée");
        $histoireBateau1->setProprietaire("Ville de La Rochelle");
        $histoireBateau1->setAnneeEntreeCollection(\DateTime::createFromFormat('Y','1988'));
        $histoireBateau1->setDateMonumentHistorique(\DateTime::createFromFormat('d/m/Y','24/04/2004'));
        $histoireBateau1->setAnneeRestauration(\DateTime::createFromFormat('Y','2005'));
        $histoireBateau1->setHistorique("Le France 1 a assuré ses missions pendant 27 années jusqu'à l'entrée en service des satellites météorologiques en 1985. Il devait alors opérer de longues stations sur les lieux de formation et de passage des pires dépressions au large de l'océan Atlantique. Fouetté par des vents atteignant parfois 100 nœuds (180 km/h), balancé par des creux de 20 mètres, ce navire, quel que soit le temps, a rempli sa mission pendant près de 30 ans, et a fait la pluie et le beau temps pour la Météorologie Nationale.");
        $histoireBateau1->setBateau($bateau1);
        $histoireBateau1->setTemoignage("TEST TEMOIGNAGE 1");
        $manager->persist($histoireBateau1);

        $histoireBateau2 = new HistoireBateau();
        $histoireBateau2->setAnneeLancement(\DateTime::createFromFormat('Y','1958'));
        $histoireBateau2->setConstructeur("Ateliers et chantiers de La Rochelle Pallice");
        $histoireBateau2->setProprietaire("Union des remorqueurs de l'océan");
        $histoireBateau2->setAnneeEntreeCollection(\DateTime::createFromFormat('Y','1989'));
        $histoireBateau2->setDateMonumentHistorique(\DateTime::createFromFormat('d/m/Y','17/05/1995'));
        $histoireBateau2->setAnneeRestauration(\DateTime::createFromFormat('Y','2013'));
        $histoireBateau2->setHistorique("Il fut construit en 1958 aux chantiers navals des ACRP à La Rochelle, où il ira par la suite à Saint-Nazaire commencer sa carrière. Il effectuera des remorquages pendant plus de treize ans et retournera à La Rochelle, au port de La Pallice où il sera désarmé en 1989. Après un accident, le président de l'Union des Remorqueurs de l'Océan demande alors au Musée Maritime de La Rochelle d'en assurer la conservation. Le remorqueur sera hissé sur le slipway en septembre 1994 pour une restauration de sa coque et de son pont. L’année d’après, en 1995, Saint-Gilles est classé « monument historique ».

Après plusieurs phases de restauration pour pouvoir le rendre à nouveau navigable, il a été remis à l'eau le 18 septembre 2009 et fait ainsi parti de l'un des huit navires de la flotte patrimoniale du musée maritime.

Avec sa coque noire et sa cheminée jaune, vous pourrez l’apercevoir près du France 1.");
        $histoireBateau2->setBateau($bateau2);
        $histoireBateau2->setTemoignage("TEST TEMOIGNAGE 2");
        $manager->persist($histoireBateau2);

        $localisationBateau1 = new LocalisationBateau();
        $localisationBateau1->setLongitude(46.15081010207477);
        $localisationBateau1->setLatitude(-1.1517542070566573);
        $localisationBateau1->setBateau($bateau1);
        $localisationBateau1->setLieuActuel("La rochelle");
        $manager->persist($localisationBateau1);

        $localisationBateau1 = new LocalisationBateau();
        $localisationBateau1->setLongitude(46.15023880126936);
        $localisationBateau1->setLatitude(-1.151960667478636);
        $localisationBateau1->setBateau($bateau2);
        $localisationBateau1->setLieuActuel("La rochelle");
        $manager->persist($localisationBateau1);


        $planningVisite1 = new PlanningVisite();
        $planningVisite1->setHeureDebut(\DateTime::createFromFormat('G:i:s','9:23:00'));
        $planningVisite1->setJour(\DateTime::createFromFormat('d/m/Y','22/03/2021'));
        $planningVisite1->setBateau($bateau1);
        $planningVisite1->setNbPersonneInscrites(3);

        $planningVisite2 = new PlanningVisite();
        $planningVisite2->setHeureDebut(\DateTime::createFromFormat('G:i:s','10:00:00'));
        $planningVisite2->setJour(\DateTime::createFromFormat('d/m/Y','23/03/2021'));
        $planningVisite2->setBateau($bateau2);
        $planningVisite2->setNbPersonneInscrites(5);



        $manager->flush();
    }
}
