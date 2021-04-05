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
     * @Rest\View(serializerGroups={})
     * @Rest\Get ("/api/musee/image", name="api_get_imageMusee")
     */
    public function getImageMusee (MuseeRepository $repository)
    {
        $musee = $repository->findOneById(1);
        $image = $musee->getImage();
        return $image;
    }

    /**
     * @Rest\View()
     * @Rest\Get ("/api/musee/horaireOuverture/", name="api_get_horaireOuverture")
     */
    public function getHoraireOuverture(MuseeRepository $repository)
    {
        $musee = $repository->findOneById(1);
        $horaireOuverture = $musee->getHoraireOuverture();
        return $horaireOuverture;
    }

    /**
     * @Rest\View()
     * @Rest\Get ("/api/musee/horaireFermeture/", name="api_get_horaireFermeture")
     */
    public function getHoraireFermeture(MuseeRepository $repository)
    {
        $musee = $repository->findOneById(1);
        $horaireFermeture = $musee->getHoraireFermeture();
        return $horaireFermeture;
    }

    /**
     * @Rest\View()
     * @Rest\Get ("/api/musee/joursFermeture/", name="api_get_joursFermeture")
     */
    public function getJoursFermeture(MuseeRepository $repository)
    {
        $musee = $repository->findOneById(1);
        $joursFermeture = $musee->getJoursFermeture();
        return $joursFermeture;
    }
}
