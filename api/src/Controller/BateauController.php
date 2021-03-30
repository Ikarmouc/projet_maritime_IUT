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
     * @Rest\View()
     * @Rest\Get("/api/musee/positionBateaux",
     *     name="api_map_bateaux")
     */

    public function getNomBateau(Request $request, BateauRepository $repository, SerializerInterface $serializer){
        $bateau = $repository->findOneBy(array('id' => $request->get('id')));
        $nomBateau = $bateau->getNom();
        $nomBateauJson = $serializer->serialize($nomBateau, 'json');
        return new JsonResponse($nomBateauJson, 200, [], true);
    }

    public function getLatitudeBateau(Request $request, LocalisationBateauRepository $repository, SerializerInterface $serializer){
        $bateau = $repository->findOneBy(array('id' => $request->get('id')));
        $latitudeBateau = $bateau->getLatitude();
        $latitudeBateauJson = $serializer->serialize($latitudeBateau, 'json');
        return new JsonResponse($latitudeBateauJson, 200, [], true);
    }

    public function getLongitudeBateau(Request $request, LocalisationBateauRepository $repository, SerializerInterface $serializer){
        $bateau = $repository->findOneBy(array('id' => $request->get('id')));
        $longitudeBateau = $bateau->getLongitude();
        $longitudeBateauJson = $serializer->serialize($longitudeBateau, 'json');
        return new JsonResponse($longitudeBateauJson, 200, [], true);
    }
}
