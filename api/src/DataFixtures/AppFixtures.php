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
        $musee->setId(1);
        $musee->setAddresse("Place Bernard Moitessier");
        $musee->setVille("La rochelle");
        $musee->setImage("./assets/img/museeLaRochelle.jpg");
        $musee->setJoursFermeture("Covid -> fermé jusqu'a nouvel ordre");
        $musee->setHoraireOuverture(9);
        $musee->setHoraireFermeture(23);
        $musee->setImage("museeLaRochelle.jpg");
        $manager->persist($musee);


        $bateau1 = new Bateau();
        $bateau1->setId(1);
        $bateau1->setMusee($musee);
        $bateau1->setNom("France 1");
        $bateau1->setType("Navire météorologique stationnaire");
        $bateau1->setMateriau("Acier");
        $bateau1->setPrixAchat(1200000);
        $bateau1->setLongueur(76.2);
        $bateau1->setLargeur(12.5);
        $bateau1->setPoids(1381);
        $bateau1->setCapacitePersonne(10);
        $bateau1->setTemoignageAudio("./assets/Audio/temoignageBateau1");
        $bateau1->setTemoignageTexte("C’est à cette fonction que j’ai navigué sur le France 1. J’ai fait trois points sur la frégate, le point A, le point  J et le point K. Le plus mouvementé fut sûrement le Point K. Nous avons eu 18 mètres de creux et 200 kms heure de vent pendant 27 jours, des coups de gite de plus de 30°jusqu’à avoir une fois 43° je me demande encore aujourd’hui comment on s’est redressé, car à la passerelle, on ne devait pas rigoler pour tenir la barre. Mais bon ... On n’y pensait pas, on marchait plus sur les cloisons que sur le sol des coursives.  Nos chaussures laissaient des marques jusque 50cm au dessus du parquet ! Inutile de nettoyer …le lendemain il y en avait autant ! Donc, on attendait La Pallice pour tout remettre en état. Pour servir à table, pas de problèmes. Par temps calme, je marchais sur le parquet en lino. Celui-ci était un vrai miroir tellement on le faisait briller. Cela nous aidait quand il y avait du mauvais temps ! Ca vous intrigue ? Je vais vous expliquer !  Quand il y avait de la gîte et du tangage,  je me mettais sur le pas de la porte du carré avec mes plats. Le gars qui voulait remplir son assiette m’attrapait par la ceinture, je me bloquais entre deux chaises et  je le servais.  Je passais au suivant de la même manière, et je faisais de même avec  les gars qui étaient dans le sens du tangage, je passais d’une table à l’autre, en glissant d’un bout à l’autre du carré. Et c’était comme ça si souvent  que cela ne nous frappait pas plus que ça !");
        $manager->persist($bateau1);
        $manager->persist($bateau1);


        $bateau2 = new Bateau();
        $bateau2->setId(2);
        $bateau2->setMusee($musee);
        $bateau2->setNom("Saint Gilles");
        $bateau2->setType("Remorqueur portuaire et de haute mer");
        $bateau2->setMateriau("Acier");
        $bateau2->setPrixAchat(150000);
        $bateau2->setLongueur(30.30);
        $bateau2->setLargeur(7.92);
        $bateau2->setPoids(182.69);
        $bateau2->setCapacitePersonne(10);
        $bateau2->setTemoignageAudio("./public/Audio/temoignageBateau2");
        $bateau2->setTemoignageTexte("Un récit d'Erwan Jégo. Quand je suis à La Rochelle,  il n’y a pas un jour où je ne passe voir le Saint Gilles sur le slipway. Je suis très fier de le voir là-haut, tout brillant et restauré avec l’espoir de sa prochaine remise à l’eau. (NDLR : interview réalisé en 2004. Le Saint Gilles était alors en travaux sur le slipway. Il est actuellement à l’eau, amarré à couple du France I. Ce bateau me tient à cœur, J’ai vécu des moments très forts à son bord pendant 5/6 ans et l’ai commandé après Georges Terrier. Je me souviens en particulier du remorquage de l’Ile de France dans le golfe de Gascogne. J’ai aussi commandé son sister-ship, Le Guérande que j’ai emmené aux Antilles. Quand j’ai pris le commandement du Saint Gilles, nous étions basés à La Pallice. On rentrait les cargos et on effectuait divers petits remorquages côtiers. C’était un remorqueur de haute mer et c’est vrai que ces bateaux étaient construits pour l’affronter. J’en ai fait l’expérience avec « Le Guérande »  en traversant l’Atlantique dans une furie de temps. Je devais l’amener aux Antilles où Gérard Gomez voulait créer une société de remorquage. Il y avait dépression sur dépression et pas de fenêtre météo pour passer le golfe de Gascogne. L’équipage avait embarqué, mon directeur était parmi nous et voulait voir son bateau partir et il me disait : « Erwan, tu me coûtes cher, l’équipage est au complet. Il y a des dépressions, c’est vrai,  mais c’est un remorqueur et un remorqueur,  ça prend la mer par tous les temps » Donc finalement, Gérard, mon patron et ami m’a tellement cassé les pieds que je suis parti malgré les consignes de l’administrateur des Affaires Maritimes.  Ce bateau avait 35 ans et il aurait fallu attendre un meilleur temps …On s’est pris une branlée dans le Golfe de Gascogne avec des creux de 10/12 mètres. Les Guadeloupéens ne connaissaient pas ça bien entendu. Ils étaient affalés à la passerelle et il n’y avait plus personne à la bécane ! Le moteur tournait …on se demandait comment… et le bateau avançait à l’épaulée vers la grosse lame… (Avancer à l’épaulée : prendre la mer par l’épaule du navire, c’est à dire par le coté pour empêcher le navire de trop s’immerger au tangage). On a gardé ce temps jusqu’après le Cap Finistère. Ca s’est assagi vers Les Canaries. Au début de la mise en place de la société de remorquage, on n’avait pas beaucoup et l’armateur se faisait du souci. Je le rassurais en lui disant qu’il fallait le temps de se faire des clients. On a pu très vite montrer ce qu’on pouvait faire en sauvant un magnifique voilier qui s’était foutu au sec aux Saintes, un gros catamaran à moteur qui transportait 400 passagers, un cargo en perdition sur les côtes guadeloupéennes … Ce remorqueur qui avait été rebaptisé « Boris » a tourné pendant 10/12 ans et a été remplacé dernièrement par un bateau que j’avais commandé aussi à la Pallice Le Ouessant. Comme le Saint Gilles, ce navire, le Guérande avait été construit lui aussi à La Pallice. Il était un peu plus gros et plus puissant et avait été armé par l’URO à Bordeaux avant d’être vendu aux Antilles. Récit recueilli auprès d’Erwan Jego lors d’ « Alors, Raconte ! 2010 ».");
        $manager->persist($bateau2);



        $histoireBateau1 = new HistoireBateau();
        $histoireBateau1->setId(1);
        $histoireBateau1->setAnneeLancement(\DateTime::createFromFormat('Y',"1958"));
        $histoireBateau1->setConstructeur("Forges et Chantiers de la Méditerranée");
        $histoireBateau1->setProprietaire("Ville de La Rochelle");
        $histoireBateau1->setAnneeEntreeCollection(\DateTime::createFromFormat('Y','1988'));
        $histoireBateau1->setDateMonumentHistorique(\DateTime::createFromFormat('d/m/Y','24/04/2004'));
        $histoireBateau1->setAnneeRestauration(\DateTime::createFromFormat('Y','2005'));
        $histoireBateau1->setHistorique("Le France 1 a assuré ses missions pendant 27 années jusqu'à l'entrée en service des satellites météorologiques en 1985. Il devait alors opérer de longues stations sur les lieux de formation et de passage des pires dépressions au large de l'océan Atlantique. Fouetté par des vents atteignant parfois 100 nœuds (180 km/h), balancé par des creux de 20 mètres, ce navire, quel que soit le temps, a rempli sa mission pendant près de 30 ans, et a fait la pluie et le beau temps pour la Météorologie Nationale.");
        $histoireBateau1->setBateau($bateau1);

        //$histoireBateau1->setTemoignageAudio("./public/Audio/temoignageBateau1");
        //$histoireBateau1->setTemoignageTexte("C’est à cette fonction que j’ai navigué sur le France 1. J’ai fait trois points sur la frégate, le point A, le point  J et le point K. Le plus mouvementé fut sûrement le Point K. Nous avons eu 18 mètres de creux et 200 kms heure de vent pendant 27 jours, des coups de gite de plus de 30°jusqu’à avoir une fois 43° je me demande encore aujourd’hui comment on s’est redressé, car à la passerelle, on ne devait pas rigoler pour tenir la barre. Mais bon ... On n’y pensait pas, on marchait plus sur les cloisons que sur le sol des coursives.  Nos chaussures laissaient des marques jusque 50cm au dessus du parquet ! Inutile de nettoyer …le lendemain il y en avait autant ! Donc, on attendait La Pallice pour tout remettre en état. Pour servir à table, pas de problèmes. Par temps calme, je marchais sur le parquet en lino. Celui-ci était un vrai miroir tellement on le faisait briller. Cela nous aidait quand il y avait du mauvais temps ! Ca vous intrigue ? Je vais vous expliquer !  Quand il y avait de la gîte et du tangage,  je me mettais sur le pas de la porte du carré avec mes plats. Le gars qui voulait remplir son assiette m’attrapait par la ceinture, je me bloquais entre deux chaises et  je le servais.  Je passais au suivant de la même manière, et je faisais de même avec  les gars qui étaient dans le sens du tangage, je passais d’une table à l’autre, en glissant d’un bout à l’autre du carré. Et c’était comme ça si souvent  que cela ne nous frappait pas plus que ça !");
        $manager->persist($histoireBateau1);

        $histoireBateau2 = new HistoireBateau();
        $histoireBateau2->setId(2);
        $histoireBateau2->setAnneeLancement(\DateTime::createFromFormat('Y','1958'));
        $histoireBateau2->setConstructeur("Ateliers et chantiers de La Rochelle Pallice");
        $histoireBateau2->setProprietaire("Union des remorqueurs de l'océan");
        $histoireBateau2->setAnneeEntreeCollection(\DateTime::createFromFormat('Y','1989'));
        $histoireBateau2->setDateMonumentHistorique(\DateTime::createFromFormat('d/m/Y','17/05/1995'));
        $histoireBateau2->setAnneeRestauration(\DateTime::createFromFormat('Y','2013'));
        $histoireBateau2->setHistorique("Il fut construit en 1958 aux chantiers navals des ACRP à La Rochelle, où il ira par la suite à Saint-Nazaire commencer sa carrière. Il effectuera des remorquages pendant plus de treize ans et retournera à La Rochelle, au port de La Pallice où il sera désarmé en 1989. Après un accident, le président de l'Union des Remorqueurs de l'Océan demande alors au Musée Maritime de La Rochelle d'en assurer la conservation. Le remorqueur sera hissé sur le slipway en septembre 1994 pour une restauration de sa coque et de son pont. L’année d’après, en 1995, Saint-Gilles est classé « monument historique ».Après plusieurs phases de restauration pour pouvoir le rendre à nouveau navigable, il a été remis à l'eau le 18 septembre 2009 et fait ainsi parti de l'un des huit navires de la flotte patrimoniale du musée maritime.Avec sa coque noire et sa cheminée jaune, vous pourrez l’apercevoir près du France 1.");
        $histoireBateau2->setBateau($bateau2);
        //$histoireBateau2->setTemoignageAudio("./public/Audio/temoignageBateau2");
        //$histoireBateau2->setTemoignageTexte("Un récit d'Erwan Jégo. Quand je suis à La Rochelle,  il n’y a pas un jour où je ne passe voir le Saint Gilles sur le slipway. Je suis très fier de le voir là-haut, tout brillant et restauré avec l’espoir de sa prochaine remise à l’eau. (NDLR : interview réalisé en 2004. Le Saint Gilles était alors en travaux sur le slipway. Il est actuellement à l’eau, amarré à couple du France I. Ce bateau me tient à cœur, J’ai vécu des moments très forts à son bord pendant 5/6 ans et l’ai commandé après Georges Terrier. Je me souviens en particulier du remorquage de l’Ile de France dans le golfe de Gascogne. J’ai aussi commandé son sister-ship, Le Guérande que j’ai emmené aux Antilles. Quand j’ai pris le commandement du Saint Gilles, nous étions basés à La Pallice. On rentrait les cargos et on effectuait divers petits remorquages côtiers. C’était un remorqueur de haute mer et c’est vrai que ces bateaux étaient construits pour l’affronter. J’en ai fait l’expérience avec « Le Guérande »  en traversant l’Atlantique dans une furie de temps. Je devais l’amener aux Antilles où Gérard Gomez voulait créer une société de remorquage. Il y avait dépression sur dépression et pas de fenêtre météo pour passer le golfe de Gascogne. L’équipage avait embarqué, mon directeur était parmi nous et voulait voir son bateau partir et il me disait : « Erwan, tu me coûtes cher, l’équipage est au complet. Il y a des dépressions, c’est vrai,  mais c’est un remorqueur et un remorqueur,  ça prend la mer par tous les temps » Donc finalement, Gérard, mon patron et ami m’a tellement cassé les pieds que je suis parti malgré les consignes de l’administrateur des Affaires Maritimes.  Ce bateau avait 35 ans et il aurait fallu attendre un meilleur temps …On s’est pris une branlée dans le Golfe de Gascogne avec des creux de 10/12 mètres. Les Guadeloupéens ne connaissaient pas ça bien entendu. Ils étaient affalés à la passerelle et il n’y avait plus personne à la bécane ! Le moteur tournait …on se demandait comment… et le bateau avançait à l’épaulée vers la grosse lame… (Avancer à l’épaulée : prendre la mer par l’épaule du navire, c’est à dire par le coté pour empêcher le navire de trop s’immerger au tangage). On a gardé ce temps jusqu’après le Cap Finistère. Ca s’est assagi vers Les Canaries. Au début de la mise en place de la société de remorquage, on n’avait pas beaucoup et l’armateur se faisait du souci. Je le rassurais en lui disant qu’il fallait le temps de se faire des clients. On a pu très vite montrer ce qu’on pouvait faire en sauvant un magnifique voilier qui s’était foutu au sec aux Saintes, un gros catamaran à moteur qui transportait 400 passagers, un cargo en perdition sur les côtes guadeloupéennes … Ce remorqueur qui avait été rebaptisé « Boris » a tourné pendant 10/12 ans et a été remplacé dernièrement par un bateau que j’avais commandé aussi à la Pallice Le Ouessant. Comme le Saint Gilles, ce navire, le Guérande avait été construit lui aussi à La Pallice. Il était un peu plus gros et plus puissant et avait été armé par l’URO à Bordeaux avant d’être vendu aux Antilles. Récit recueilli auprès d’Erwan Jego lors d’ « Alors, Raconte ! 2010 ».");
        $manager->persist($histoireBateau2);

        $localisationBateau1 = new LocalisationBateau();
        $localisationBateau1->setId(1);
        $localisationBateau1->setLongitude(46.15081010207477);
        $localisationBateau1->setLatitude(-1.1517542070566573);
        $localisationBateau1->setBateau($bateau1);
        $localisationBateau1->setLieuActuel("La rochelle");
        $manager->persist($localisationBateau1);

        $localisationBateau2 = new LocalisationBateau();
        $localisationBateau2->setId(2);
        $localisationBateau2->setLongitude(46.15023880126936);
        $localisationBateau2->setLatitude(-1.151960667478636);
        $localisationBateau2->setBateau($bateau2);
        $localisationBateau2->setLieuActuel("La rochelle");
        $manager->persist($localisationBateau2);


        $planningVisite1 = new PlanningVisite();
        $planningVisite1->setId(1);
        $planningVisite1->setHeureDebut(\DateTime::createFromFormat('G:i:s','9:23:00'));
        $planningVisite1->setJour(\DateTime::createFromFormat('d/m/Y','22/03/2021'));
        $planningVisite1->setBateau($bateau1);
        $planningVisite1->setNbPersonneInscrites(3);

        $planningVisite2 = new PlanningVisite();
        $planningVisite1->setId(2);
        $planningVisite2->setHeureDebut(\DateTime::createFromFormat('G:i:s','10:00:00'));
        $planningVisite2->setJour(\DateTime::createFromFormat('d/m/Y','23/03/2021'));
        $planningVisite2->setBateau($bateau2);
        $planningVisite2->setNbPersonneInscrites(5);



/*
        $musee = new Musee();
        $musee->setId(1);
        $musee->setAddresse("Place Bernard Moitessier");
        $musee->setVille("LaRochelle");
        $musee->setJoursFermeture("Covid -> fermé jusqu'a nouvel ordre");
        $musee->setHoraireOuverture(9);
        $musee->setHoraireFermeture(23);
        $musee->setImage("museeLaRochelle.jpg");
        $manager->persist($musee);*/
        $manager->flush();
    }
}
