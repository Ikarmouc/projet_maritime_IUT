import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MeteoService} from './meteo.service';

@Component({
  selector: 'app-meteo',
  templateUrl: './meteo.component.html',
  styleUrls: ['./meteo.component.css']
})
export class MeteoComponent implements OnInit {

  public forecastData: Array<any> = [];

  constructor(private _httpClient: HttpClient, private _meteoService: MeteoService) {
    // Instanciation du service MeteoService
    this._meteoService = new MeteoService(_httpClient);
  }

  ngOnInit(): void {
    // Appel de la fonction crée dans le .service lié et traitement des données
    this._meteoService.getForecastValues().subscribe(
      (data) => {
        // Dans le cas où la requête passe, traitement des données
        console.log('Request sent successfully !' , data);
        this.forecastData.push(data);
      },
      (error) => {
        // Dans le cas où une erreur survient (souvent due aux appels de l'api openweatherapi [60/min maximum])
        console.log('Error ! : ' , error);
      }
    );
  }
}
