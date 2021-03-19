<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BateauController extends AbstractController
{
    /**
     * @Route("/bateau", name="bateau")
     */
    public function index(): Response
    {
        return $this->render('bateau/index.html.twig', [
            'controller_name' => 'BateauController',
        ]);
    }
}
