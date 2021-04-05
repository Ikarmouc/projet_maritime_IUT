<?php

namespace App\Controller;

use App\Domain\HistoriqueBateaux;
use App\Domain\Query\HistoireBateauHandler;
use App\Domain\Query\HistoireBateauQuery;
use App\Domain\Query\InformationBateauxHandler;
use App\Domain\Query\InformationsBateauxQuery;
use App\Domain\Query\TemoignageBateauHandler;
use App\Domain\Query\TemoignageBateauQuery;
use App\Entity\Bateau;
use App\Entity\HistoireBateau;
use App\Repository\BateauRepository;
use App\Repository\HistoireBateauRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Repository\MuseeRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;



class BateauController extends AbstractController
{

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







}
