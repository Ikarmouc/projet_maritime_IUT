<?php

namespace App\Controller;

use App\Entity\Meteo;
use App\Repository\MeteoRepository;
use phpDocumentor\Reflection\DocBlock\Description;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Serializer\Serializer;


class MeteoController extends AbstractController
{
    /**
     * @Rest\View()
     * @Rest\Get ("/api/musee/meteoTest", name="meteoTest")
     */
    public function index(): Response
    {
        return $this->render('meteo/index.html.twig', [
            'controller_name' => 'MeteoController',
        ]);
    }



    /**
     * @Rest\View()
     * @Rest\Get ("/api/meteo", name="meteo")
     */
    public function getTodaysForecast(): Response{

        // Http request to the openweathermap api that generates json content
        $url = "http://api.openweathermap.org/data/2.5/weather?lat=46.160329&lon=-1.151139&units=metric&lang=fr&appid=174a946e97d5fe1016efe30dc8f5fe76";
        $raw = file_get_contents($url);
        $data = json_decode($raw);

        // Today's forecast data (displayed in website's home)
        $forecastDay = "Aujourd'hui";
        $forecastIcon = "http://openweathermap.org/img/wn/"  . $data->{'weather'}[0]->{'icon'} . ".png";
        $forecastCurrentTemp = $data->{'main'}->{'temp'}."°C";
        $forecastDescription = $data->{'weather'}[0]->{'description'};
        $forecastFeelsLikeTemp = $data->{'main'}->{'feels_like'}."°C";
        $forecastMaxTemp = $data->{'main'}->{'temp_max'}."°C";
        $forecastMinTemp = $data->{'main'}->{'temp_min'}."°C";
        $forecastWindSpeed = $data->{'wind'}->{'speed'}."km/h";
        $forecastHumidity = $data->{'main'}->{'humidity'}."%";

        // Creation of the entity manager
        $entityManager = $this->getDoctrine()->getManager();

        // Deletion of all data in meteo table
        $meteo = $entityManager->getRepository(Meteo::class)->findAll();
        $deletionIndex = 0;
        foreach($meteo as &$value){
            $entityManager->remove($meteo[$deletionIndex]);
            $deletionIndex ++;
        }
        $entityManager->flush();

        // Entity creation
        $meteo_0 = new Meteo();

        // Inserts for the meteo_0 instance
        $meteo_0->setJour($forecastDay);
        $meteo_0->setTemperature($forecastCurrentTemp);
        $meteo_0->setIcone($forecastIcon);
        $meteo_0->setDescription($forecastDescription);
        $meteo_0->setTemperatureRessentie($forecastFeelsLikeTemp);
        $meteo_0->setTemperatureMin($forecastMinTemp);
        $meteo_0->setTemperatureMax($forecastMaxTemp);
        $meteo_0->setVitesseVent($forecastWindSpeed);
        $meteo_0->setHumidite($forecastHumidity);
        $entityManager->persist($meteo_0);

        $entityManager->flush();

        return new Response('Saved forecast for :'.$meteo_0->getJour());
    }

    /**
     * @Rest\View()
     * @Rest\Get ("/api/meteo3j", name="meteo3j")
     */
    function getThreeDaysForecast(): Response{


        // Http request to the openweathermap api that generates json content
        $url = "http://api.openweathermap.org/data/2.5/onecall?lat=46.160329&lon=-1.151139&units=metric&exclude=hourly,minutely,alerts,current&lang=fr&appid=174a946e97d5fe1016efe30dc8f5fe76";
        $raw = file_get_contents($url);
        $data = json_decode($raw);

        // Daily forecast data : today (displayed on website's "Météo" page)
        $forecastCurrentTemp = $data->{'daily'}[0]->{'temp'}->{'day'}."°C";
        $forecastCurrentWindSpeed = $data->{'daily'}[0]->{'wind_speed'}."km/h";
        $forecastCurrentHumidity = $data->{'daily'}[0]->{'humidity'}."%";
        $forecastCurrentLogo = "http://openweathermap.org/img/wn/".$data->{'daily'}[0]->{'weather'}[0]->{'icon'}.".png";
        $forecastCurrentTempMin = $data->{'daily'}[0]->{'temp'}->{'min'}."°C";
        $forecastCurrentTempMax = $data->{'daily'}[0]->{'temp'}->{'max'}."°C";
        $forecastCurrentDescription = $data->{'daily'}[0]->{'weather'}[0]->{'description'};
        $forecastCurrentDay = "Aujourd'hui";
        $forecastCurrentTempFeelsLike = $data->{'daily'}[0]->{'temp'}->{'day'}."°C";

        // Daily forecast data : 1 day (displayed on website's "Météo" page)
        $forecastOneDayTemp = $data->{'daily'}[1]->{'temp'}->{'day'}."°C";
        $forecastOneDayWindSpeed = $data->{'daily'}[1]->{'wind_speed'}."km/h";
        $forecastOneDayHumidity = $data->{'daily'}[1]->{'humidity'}."%";
        $forecastOneDayLogo = "http://openweathermap.org/img/wn/".$data->{'daily'}[1]->{'weather'}[0]->{'icon'}.".png";
        $forecastOneDayTempMin = $data->{'daily'}[1]->{'temp'}->{'min'}."°C";
        $forecastOneDayTempMax = $data->{'daily'}[1]->{'temp'}->{'max'}."°C";
        $forecastOneDayDescription = $data->{'daily'}[1]->{'weather'}[0]->{'description'};
        $forecastOneDayDay = date( "l", strtotime( "+1 days" ) );
        $forecastOneDayTempFeelsLike = $data->{'daily'}[1]->{'temp'}->{'day'}."°C";
        switch ($forecastOneDayDay){
            case "Monday":
                $forecastOneDayDay = "Lundi";
                break;
            case "Tuesday":
                $forecastOneDayDay = "Mardi";
                break;
            case "Wednesday":
                $forecastOneDayDay = "Mercredi";
                break;
            case "Thursday":
                $forecastOneDayDay = "Jeudi";
                break;
            case "Friday":
                $forecastOneDayDay = "Vendredi";
                break;
            case "Saturday":
                $forecastOneDayDay = "Samedi";
                break;
            case "Sunday":
                $forecastOneDayDay = "Dimanche";
                break;
            default :
                echo("Screwed up");
        }


        // Daily forecast data : 2 days (displayed on website's "Météo" page)
        $forecastTwoDaysTemp = $data->{'daily'}[2]->{'temp'}->{'day'}."°C";
        $forecastTwoDaysWindSpeed = $data->{'daily'}[2]->{'wind_speed'}."km/h";
        $forecastTwoDaysHumidity = $data->{'daily'}[2]->{'humidity'}."%";
        $forecastTwoDaysLogo = "http://openweathermap.org/img/wn/".$data->{'daily'}[2]->{'weather'}[0]->{'icon'}.".png";
        $forecastTwoDaysTempMin = $data->{'daily'}[2]->{'temp'}->{'min'}."°C";
        $forecastTwoDaysTempMax = $data->{'daily'}[2]->{'temp'}->{'max'}."°C";
        $forecastTwoDaysDescription = $data->{'daily'}[2]->{'weather'}[0]->{'description'};
        $forecastTwoDaysDay = date( "l", strtotime( "+2 days" ) );
        $forecastTwoDaysTempFeelsLike = $data->{'daily'}[2]->{'temp'}->{'day'}."°C";
        switch ($forecastTwoDaysDay){
            case "Monday":
                $forecastTwoDaysDay = "Lundi";
                break;
            case "Tuesday":
                $forecastTwoDaysDay = "Mardi";
                break;
            case "Wednesday":
                $forecastTwoDaysDay = "Mercredi";
                break;
            case "Thursday":
                $forecastTwoDaysDay = "Jeudi";
                break;
            case "Friday":
                $forecastTwoDaysDay = "Vendredi";
                break;
            case "Saturday":
                $forecastTwoDaysDay = "Samedi";
                break;
            case "Sunday":
                $forecastTwoDaysDay = "Dimanche";
                break;
            default :
                echo("Screwed up");
        }


        // Daily forecast data : 3 days (displayed on website's "Météo" page)
        $forecastThreeDaysTemp = $data->{'daily'}[3]->{'temp'}->{'day'}."°C";
        $forecastThreeDaysWindSpeed = $data->{'daily'}[3]->{'wind_speed'}."km/h";
        $forecastThreeDaysHumidity = $data->{'daily'}[3]->{'humidity'}."%";
        $forecastThreeDaysLogo = "http://openweathermap.org/img/wn/".$data->{'daily'}[3]->{'weather'}[0]->{'icon'}.".png";
        $forecastThreeDaysTempMin = $data->{'daily'}[3]->{'temp'}->{'min'}."°C";
        $forecastThreeDaysTempMax = $data->{'daily'}[3]->{'temp'}->{'max'}."°C";
        $forecastThreeDaysDescription = $data->{'daily'}[3]->{'weather'}[0]->{'description'};
        $forecastThreeDaysTempFeelsLike = $data->{'daily'}[3]->{'temp'}->{'day'}."°C";
        $forecastThreeDaysDay = date( "l", strtotime( "+3 days" ) );
        switch ($forecastThreeDaysDay){
            case "Monday":
                $forecastThreeDaysDay = "Lundi";
                break;
            case "Tuesday":
                $forecastThreeDaysDay = "Mardi";
                break;
            case "Wednesday":
                $forecastThreeDaysDay = "Mercredi";
                break;
            case "Thursday":
                $forecastThreeDaysDay = "Jeudi";
                break;
            case "Friday":
                $forecastThreeDaysDay = "Vendredi";
                break;
            case "Saturday":
                $forecastThreeDaysDay = "Samedi";
                break;
            case "Sunday":
                $forecastThreeDaysDay = "Dimanche";
                break;
            default :
                echo("Screwed up");
        }

        // Creation of the entity manager
        $entityManager = $this->getDoctrine()->getManager();

        // Deletion of all data in meteo table
        $meteo = $entityManager->getRepository(Meteo::class)->findAll();
        $deletionIndex = 0;
        foreach($meteo as &$value){
            $entityManager->remove($meteo[$deletionIndex]);
            $deletionIndex ++;
        }
        $entityManager->flush();

        // Entities creation
        $meteo_0 = new Meteo();
        $meteo_1 = new Meteo();
        $meteo_2 = new Meteo();
        $meteo_3 = new Meteo();

        // Inserts for the meteo_0 instance
        $meteo_0->setJour($forecastCurrentDay);
        $meteo_0->setTemperature($forecastCurrentTemp);
        $meteo_0->setIcone($forecastCurrentLogo);
        $meteo_0->setDescription($forecastCurrentDescription);
        $meteo_0->setTemperatureRessentie($forecastCurrentTempFeelsLike);
        $meteo_0->setTemperatureMin($forecastCurrentTempMin);
        $meteo_0->setTemperatureMax($forecastCurrentTempMax);
        $meteo_0->setVitesseVent($forecastCurrentWindSpeed);
        $meteo_0->setHumidite($forecastCurrentHumidity);
        $entityManager->persist($meteo_0);

        // Inserts for the meteo_1 instance
        $meteo_1->setJour($forecastOneDayDay);
        $meteo_1->setTemperature($forecastOneDayTemp);
        $meteo_1->setIcone($forecastOneDayLogo);
        $meteo_1->setDescription($forecastOneDayDescription);
        $meteo_1->setTemperatureRessentie($forecastOneDayTempFeelsLike);
        $meteo_1->setTemperatureMin($forecastOneDayTempMin);
        $meteo_1->setTemperatureMax($forecastOneDayTempMax);
        $meteo_1->setVitesseVent($forecastOneDayWindSpeed);
        $meteo_1->setHumidite($forecastOneDayHumidity);
        $entityManager->persist($meteo_1);

        // Inserts for the meteo_2 instance
        $meteo_2->setJour($forecastTwoDaysDay);
        $meteo_2->setTemperature($forecastTwoDaysTemp);
        $meteo_2->setIcone($forecastTwoDaysLogo);
        $meteo_2->setDescription($forecastTwoDaysDescription);
        $meteo_2->setTemperatureRessentie($forecastTwoDaysTempFeelsLike);
        $meteo_2->setTemperatureMin($forecastTwoDaysTempMin);
        $meteo_2->setTemperatureMax($forecastTwoDaysTempMax);
        $meteo_2->setVitesseVent($forecastTwoDaysWindSpeed);
        $meteo_2->setHumidite($forecastTwoDaysHumidity);
        $entityManager->persist($meteo_2);

        // Inserts for the meteo_3 instance
        $meteo_3->setJour($forecastThreeDaysDay);
        $meteo_3->setTemperature($forecastThreeDaysTemp);
        $meteo_3->setIcone($forecastThreeDaysLogo);
        $meteo_3->setDescription($forecastThreeDaysDescription);
        $meteo_3->setTemperatureRessentie($forecastThreeDaysTempFeelsLike);
        $meteo_3->setTemperatureMin($forecastThreeDaysTempMin);
        $meteo_3->setTemperatureMax($forecastThreeDaysTempMax);
        $meteo_3->setVitesseVent($forecastThreeDaysWindSpeed);
        $meteo_3->setHumidite($forecastThreeDaysHumidity);
        $entityManager->persist($meteo_3);


        $entityManager->flush();

        $values = [['day'=>$forecastCurrentDay, 'temp'=>$forecastCurrentTemp, 'wind_speed'=>$forecastCurrentWindSpeed, 'humidity'=>$forecastCurrentHumidity, 'logo'=>$forecastCurrentLogo, 'temp_min'=>$forecastCurrentTempMin, 'temp_max'=>$forecastCurrentTempMax, 'desc'=>$forecastCurrentDescription, 'temp_feels_like'=>$forecastCurrentTempFeelsLike],['day'=>$forecastOneDayDay, 'temp'=>$forecastOneDayTemp, 'wind_speed'=>$forecastOneDayWindSpeed, 'humidity'=>$forecastOneDayHumidity, 'logo'=>$forecastOneDayLogo, 'temp_min'=>$forecastOneDayTempMin, 'temp_max'=>$forecastOneDayTempMax, 'desc'=>$forecastOneDayDescription, 'temp_feels_like'=>$forecastOneDayTempFeelsLike],['day'=>$forecastTwoDaysDay, 'temp'=>$forecastTwoDaysTemp, 'wind_speed'=>$forecastTwoDaysWindSpeed, 'humidity'=>$forecastTwoDaysHumidity, 'logo'=>$forecastTwoDaysLogo, 'temp_min'=>$forecastTwoDaysTempMin, 'temp_max'=>$forecastTwoDaysTempMax, 'desc'=>$forecastTwoDaysDescription, 'temp_feels_like'=>$forecastTwoDaysTempFeelsLike],['day'=>$forecastThreeDaysDay, 'temp'=>$forecastThreeDaysTemp, 'wind_speed'=>$forecastThreeDaysWindSpeed, 'humidity'=>$forecastThreeDaysHumidity, 'logo'=>$forecastThreeDaysLogo, 'temp_min'=>$forecastThreeDaysTempMin, 'temp_max'=>$forecastThreeDaysTempMax, 'desc'=>$forecastThreeDaysDescription, 'temp_feels_like'=>$forecastThreeDaysTempFeelsLike]];

        $valuesJson = json_encode($values);

        //return new Response('Saved forecast for :'.$meteo_0->getJour().", ".$meteo_1->getJour().", ".$meteo_2->getJour()." and ".$meteo_3->getJour());

        return new Response($valuesJson,Response::HTTP_OK);
    }

}
