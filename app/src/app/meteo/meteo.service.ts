import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class MeteoService {

  // Lien vers notre api
  private _forecastUrl = 'http://localhost:9999/api/meteo3j';
  private _todayForecastUrl = 'http://localhost:9999/api/meteo';

  constructor(private _httpClient: HttpClient) { }

  // Création d'une fonction qui retourne un JSON rempli des valeurs de la météo
  getForecastValues(){
    return this._httpClient.get(this._forecastUrl);
  }

  getTodayForecast() {
    return this._httpClient.get(this._todayForecastUrl);
  }


}
