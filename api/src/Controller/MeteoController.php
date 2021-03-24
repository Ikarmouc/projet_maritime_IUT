<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Serializer\Serializer;


class MeteoController extends AbstractController
{/*
    /**
     * @Rest\View()
     * @Rest\Get ("/museeMaritime/meteo", name="meteo")
     *//*
    public function index(): Response
    {
        return $this->render('meteo/index.html.twig', [
            'controller_name' => 'MeteoController',
        ]);
    }*/

    /**
     * @Rest\View()
     * @Rest\Get ("/museeMaritime/meteo", name="meteo")
     */
    public function getTodaysForecast(){
        $url = "http://api.openweathermap.org/data/2.5/weather?lat=46.160329&lon=-1.151139&units=metric&appid=174a946e97d5fe1016efe30dc8f5fe76";
        $raw = file_get_contents($url);
        $data = json_decode($raw);
        $forecastIcon = "http://openweathermap.org/img/w/"  . $data->{'weather'}[0]->{'icon'} . ".png";
        $forecastCurrentTemp = $data->{'main'}->{'temp'}."°C";
        $forecastDescription = $data->{'weather'}[0]->{'description'};
        $forecastFeelsLikeTemp = $data->{'main'}->{'feels_like'}."°C";
        $forecastMaxTemp = $data->{'main'}->{'temp_max'}."°C";
        $forecastMinTemp = $data->{'main'}->{'temp_min'}."°C";
        $forecastWindSpeed = $data->{'wind'}->{'speed'}."km/h";
        $forecastHumidity = $data->{'main'}->{'humidity'}."%";

        /*
        print($forecastMaxTemp);
        print($forecastMinTemp);
        print($forecastWindSpeed);
        print($forecastHumidity);
        print($forecastFeelsLikeTemp);
        print($forecastIcon);
        print($forecastCurrentTemp);
        print($forecastDescription);
        */

        return $this->render('meteo/index.html.twig', [
            'controller_name' => 'MeteoController',
        ]);
    }

}
