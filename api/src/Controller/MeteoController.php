<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;


class MeteoController extends AbstractController
{
    /**
     * @Rest\View()
     * @Rest\Get ("/museeMaritime/meteo", name="meteo")
     */
    public function index(): Response
    {
        return $this->render('meteo/index.html.twig', [
            'controller_name' => 'MeteoController',
        ]);
    }

    /**
     * @Rest\View()
     * @Rest\Get ("/museeMaritime/meteo", name="meteo")
     */
    public function getThreeDaysForecast(){
        $url = "http://api.openweathermap.org/data/2.5/weather?lat=46.160329&lon=-1.151139&units=metric&appid=174a946e97d5fe1016efe30dc8f5fe76";
        $raw = file_get_contents($url);
        $json = json_decode($raw);
        print($json->weather);
        return $this->render('meteo/index.html.twig', [
            'controller_name' => 'MeteoController',
        ]);
    }

}
