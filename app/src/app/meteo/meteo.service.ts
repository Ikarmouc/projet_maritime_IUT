import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http";

@Injectable({
  providedIn: 'root'
})
export class MeteoService {

  private _forecastUrl = 'http://localhost:9999/api/musee/meteo3J';

  constructor(private _httpClient: HttpClient) { }

  getForecastValues(){

    //let dataJson;

    return this._httpClient.get(this._forecastUrl);
      /*
      .subscribe(
      (data) => {
        console.log('Request sent successfully !');

        this._data = JSON.stringify(data);
        dataJson = JSON.parse(this._data);

        //console.log(dataJson[0].day);
      },
      (error) => {
        console.log('Error ! : ' , error);
      }
    );

    .subscribe(
      (value) => {
        this._data = value;
      },
      (data) => {
        console.log('Request sent successfully !');
      },
      (error) => {
        console.log('Error ! : ' , error);
      }
    );

    */
  }
}
