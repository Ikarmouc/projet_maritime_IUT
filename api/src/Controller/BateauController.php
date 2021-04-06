<?php

namespace App\Controller;

use App\Domain\Query\ListeBateauxQuery;
use App\Repository\BateauRepository;
use App\Repository\LocalisationBateauRepository;
use App\Domain\HistoriqueBateaux;
use App\Domain\Query\HistoireBateauHandler;
use App\Domain\Query\HistoireBateauQuery;
use App\Domain\Query\InformationBateauxHandler;
use App\Domain\Query\InformationsBateauxQuery;
use App\Domain\Query\TemoignageBateauHandler;
use App\Domain\Query\TemoignageBateauQuery;
use App\Entity\Bateau;
use App\Entity\HistoireBateau;
use App\Repository\HistoireBateauRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Entity\LocalisationBateau;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\MuseeRepository;


class BateauController extends AbstractController
{

    /**
     * @Rest\View(serializerGroups={"listeBateaux"})
     * @Rest\Get("/api/musee/bateau",
     *     name="api_map_bateau")
     */

    public function listeBateaux( BateauRepository $repository,
                                  SerializerInterface $serializer)
    {
        $bateaux = $repository->findAll();
        $bateauxJson = $serializer->serialize($bateaux, 'json');
        return new JsonResponse($bateauxJson, 200, [], true);
    }

    /**
     * @Rest\View(serializerGroups={"temoignage"})
     * @Rest\Get ("/api/bateaux/{nom}/temoignage", name="getTemoignage")
     */
    public function temoignage(TemoignageBateauHandler $handler,$nom)
    {
        $query = new TemoignageBateauQuery($nom);
        $bateau = $handler->handle($query);
        return $bateau;
    }

    /**
     * @Rest\View(serializerGroups={})
     * @Rest\Get ("/api/bateaux/{nom}/informations", name="infosBateau")
     */
    public function infosBateau(InformationBateauxHandler $handler,$nom)
    {
        $query = new InformationsBateauxQuery($nom);
        $bateau = $handler->handle($query);
        return $bateau;
    }

    /**
     * @Rest\View(serializerGroups={})
     * @Rest\Get ("/api/bateaux/{nom}/historique", name="historiqueBateau")
     */
    public function historiqueBateau(HistoireBateauHandler $handler,$nom,BateauRepository $bateauRepo,Bateau $bateau)
    {

        $value = $bateauRepo->findBy(array("nom" => $bateau->getNom()));
        $query = new HistoireBateauQuery($value);
        $bateau = $handler->handle($query);
        return $bateau;
    }

    /**
     * @Rest\View(serializerGroups={"listeLivres"})
     * @Rest\Get ("/api/musee/listeBateaux", name="listeBateaux")
     */
    public function listBateau(BateauRepository $bateauRepo)
    {
       $listeBateaux = $bateauRepo->findAll();
       return $listeBateaux;
    }


}
