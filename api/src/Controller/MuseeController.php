<?php

namespace App\Controller;

use App\Repository\MuseeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request;

class MuseeController extends AbstractController
{
    /**
     * @Rest\View()
     * @Rest\Get ("/api/imageMusee", name="api_get_imageMusee", methods={"Get"})
     */
    public function getImageMusee(MuseeRepository $repository, SerializerInterface $serializer) : Response
    {
        $lienImage = "../public/img/musee.jpg";
        $lienImageJson = $serializer->serialize($lienImage, 'json');
        return new JsonResponse($lienImageJson, 200, [], true);
    }

    /**
     * @Rest\View()
     * @Rest\Get ("/api/horaireOuverture/{ville}", name="api_get_horaireOuverture", methods={"Get"})
     */
    public function getHoraireOuverture(Request $request, MuseeRepository $repository, SerializerInterface $serializer)
    {
        $musee = $repository->findOneBy(array('ville' => $request->get('ville')));
        $horaireOuverture = $musee->getHoraireOuverture();
        $horaireOuvertureJson = $serializer->serialize($horaireOuverture, 'json');
        return new JsonResponse($horaireOuvertureJson, 200, [], true);
    }

    /**
     * @Rest\View()
     * @Rest\Get ("/api/horaireFermeture/{ville}", name="api_get_horaireFermeture", methods={"Get"})
     */
    public function getHoraireFermeture(Request $request, MuseeRepository $repository, SerializerInterface $serializer)
    {
        $musee = $repository->findOneBy(array('ville' => $request->get('ville')));
        $horaireFermeture = $musee->getHoraireFermeture();
        $horaireFermetureJson = $serializer->serialize($horaireFermeture, 'json');
        return new JsonResponse($horaireFermetureJson, 200, [], true);
    }
}
