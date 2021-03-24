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

        // Http request to the openweathermap api that generates json content
        $url = "http://api.openweathermap.org/data/2.5/weather?lat=46.160329&lon=-1.151139&units=metric&appid=174a946e97d5fe1016efe30dc8f5fe76";
        $raw = file_get_contents($url);
        $data = json_decode($raw);

        // Today's forecast data (displayed in website's home)
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

    /**
     * @Rest\View()
     * @Rest\Get ("/museeMaritime/meteo3j", name="meteo3j")
     */
    function getThreeDaysForecast(){

        // Http request to the openweathermap api that generates json content
        $url = "http://api.openweathermap.org/data/2.5/onecall?lat=46.160329&lon=-1.151139&units=metric&exclude=hourly,minutely,alerts,current&appid=174a946e97d5fe1016efe30dc8f5fe76";
        $raw = file_get_contents($url);
        $data = json_decode($raw);

        // Daily forecast data : today (displayed on website's "Météo" page)
        $forecastCurrentTemp = $data->{'daily'}[0]->{'temp'}->{'day'}."°C";
        $forecastCurrentWindSpeed = $data->{'daily'}[0]->{'wind_speed'}."km/h";
        $forecastCurrentHumidity = $data->{'daily'}[0]->{'humidity'}."%";
        $forecastCurrentLogo = "http://openweathermap.org/img/w/".$data->{'daily'}[0]->{'weather'}[0]->{'icon'}.".png";
        $forecastCurrentTempMin = $data->{'daily'}[0]->{'temp'}->{'min'}."°C";
        $forecastCurrentTempMax = $data->{'daily'}[0]->{'temp'}->{'max'}."°C";

        // Daily forecast data : 1 day (displayed on website's "Météo" page)
        $forecastOneDayTemp = $data->{'daily'}[1]->{'temp'}->{'day'}."°C";
        $forecastOneDayWindSpeed = $data->{'daily'}[1]->{'wind_speed'}."km/h";
        $forecastOneDayHumidity = $data->{'daily'}[1]->{'humidity'}."%";
        $forecastOneDayLogo = "http://openweathermap.org/img/w/".$data->{'daily'}[1]->{'weather'}[0]->{'icon'}.".png";
        $forecastOneDayTempMin = $data->{'daily'}[1]->{'temp'}->{'min'}."°C";
        $forecastOneDayTempMax = $data->{'daily'}[1]->{'temp'}->{'max'}."°C";

        // Daily forecast data : 2 days (displayed on website's "Météo" page)
        $forecastTwoDaysTemp = $data->{'daily'}[2]->{'temp'}->{'day'}."°C";
        $forecastTwoDaysWindSpeed = $data->{'daily'}[2]->{'wind_speed'}."km/h";
        $forecastTwoDaysHumidity = $data->{'daily'}[2]->{'humidity'}."%";
        $forecastTwoDaysLogo = "http://openweathermap.org/img/w/".$data->{'daily'}[2]->{'weather'}[0]->{'icon'}.".png";
        $forecastTwoDaysTempMin = $data->{'daily'}[2]->{'temp'}->{'min'}."°C";
        $forecastTwoDaysTempMax = $data->{'daily'}[2]->{'temp'}->{'max'}."°C";

        // Daily forecast data : 3 days (displayed on website's "Météo" page)
        $forecastThreeDaysTemp = $data->{'daily'}[3]->{'temp'}->{'day'}."°C";
        $forecastThreeDaysWindSpeed = $data->{'daily'}[3]->{'wind_speed'}."km/h";
        $forecastThreeDaysHumidity = $data->{'daily'}[3]->{'humidity'}."%";
        $forecastThreeDaysLogo = "http://openweathermap.org/img/w/".$data->{'daily'}[3]->{'weather'}[0]->{'icon'}.".png";
        $forecastThreeDaysTempMin = $data->{'daily'}[3]->{'temp'}->{'min'}."°C";
        $forecastThreeDaysTempMax = $data->{'daily'}[3]->{'temp'}->{'max'}."°C";

        /*
        print($forecastCurrentTemp);
        print($forecastCurrentWindSpeed);
        print($forecastCurrentHumidity);
        print($forecastCurrentLogo);
        print($forecastCurrentTempMin);
        print($forecastCurrentTempMax);

        print($forecastOneDayTemp);
        print($forecastOneDayWindSpeed);
        print($forecastOneDayHumidity);
        print($forecastOneDayLogo);
        print($forecastOneDayTempMin);
        print($forecastOneDayTempMax);

        print($forecastTwoDaysTemp);
        print($forecastTwoDaysWindSpeed);
        print($forecastTwoDaysHumidity);
        print($forecastTwoDaysLogo);
        print($forecastTwoDaysTempMin);
        print($forecastTwoDaysTempMax);

        print($forecastThreeDaysTemp);
        print($forecastThreeDaysWindSpeed);
        print($forecastThreeDaysHumidity);
        print($forecastThreeDaysLogo);
        print($forecastThreeDaysTempMin);
        print($forecastThreeDaysTempMax);
        */

        return $this->render('meteo/index.html.twig', [
            'controller_name' => 'MeteoController',
        ]);
    }

}
