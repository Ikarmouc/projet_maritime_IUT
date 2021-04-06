import {Component, NgModule, OnInit} from '@angular/core';
import { ApiService } from '../api.service';
import { MeteoService} from './../meteo/meteo.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})

export class HomeComponent implements OnInit {
  imageMusee = '';
  horaireOuverture = 0;
  horaireFermeture = 0;
  joursFermeture  = 'ouvert tous les jours';
  public forecastData: Array<any> = [];
  constructor(private apiService: ApiService, private _meteoService: MeteoService) { }

  ngOnInit(): void {
    this.apiService.getImageMusee().subscribe(data => {
      this.imageMusee = data;
    }, error => {
      console.log('error: ', error);
    });

    this.apiService.getHoraireOuverture().subscribe(data => {
      this.horaireOuverture = data;
    }, error => {
      console.log('error: ', error);
    });

    this.apiService.getHoraireFermeture().subscribe(data => {
      this.horaireFermeture = data;
    }, error => {
      console.log('error: ', error);
    });

    this.apiService.getJoursFermeture().subscribe(data => {
      this.joursFermeture = data;
    }, error => {
      console.log('error: ', error);
    });

    // Appel de la fonction crée dans le .service lié et traitement des données
    this._meteoService.getTodayForecast().subscribe((data) => {
        // Dans le cas où la requête passe, traitement des données
        console.log('Request sent successfully !' , data);
        this.forecastData.push(data);
      },
      (error) => {
        // Dans le cas où une erreur survient (souvent due aux appels de l'api openweatherapi [60/min maximum])
        console.log('error : ', error);
      }
    );
  }

}
