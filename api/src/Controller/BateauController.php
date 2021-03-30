<?php

namespace App\Controller;

use App\Repository\BateauRepository;
use App\Repository\HistoireBateauRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;

class BateauController extends AbstractController
{

    /**
     * @Rest\View()
     * @Rest\Get ("/api/musee/{bateau_id}", name="ListeTexteTemoignages")
     */
    public function ListeTexteTemoignages(HistoireBateauRepository $histoireBateauRepository,BateauRepository $bateauRepository)
    {

        $temoignages = $histoireBateauRepository->findBy('bateau_id');

        return JsonResponse($temoignages, 200, [], true);
    }

}
