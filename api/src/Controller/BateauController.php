<?php

namespace App\Controller;

use App\Repository\BateauRepository;
use App\Repository\LocalisationBateauRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Entity\Bateau;
use App\Entity\LocalisationBateau;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class BateauController extends AbstractController
{

    /**
     * @Rest\View(serializerGroups={"listeBateaux"})
     * @Rest\Get("/api/musee/bateau",
     *     name="api_map_bateau")
     */

    public function listeBateaux( BateauRepository $repository,
                                  SerializerInterface $serializer){
        $bateaux = $repository->findAll();
        $bateauxJson = $serializer->serialize($bateaux, 'json');
        return new JsonResponse($bateauxJson, 200, [], true);
    }
}
