import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { MeteoService} from './meteo.service';

@Component({
  selector: 'app-meteo',
  templateUrl: './meteo.component.html',
  styleUrls: ['./meteo.component.css']
})
export class MeteoComponent implements OnInit {

  //private _forecastUrl = 'http://localhost:9999/api/musee/meteo3J';
  //private _data = "";
  public forecastData: Array<any> = [];


  constructor(private _httpClient: HttpClient, private _meteoService: MeteoService) {
    this._meteoService = new MeteoService(_httpClient);
  }

  ngOnInit(): void {

    this._meteoService.getForecastValues().subscribe(
      (data) => {
        console.log('Request sent successfully !' , data);
        this.forecastData.push(data);
      },
      (error) => {
        console.log('Error ! : ' , error);
      }
    );
  //this._forecastData = JSON.stringify(this._meteoService.getForecastValues());
  //this.forecastDataJson = JSON.parse(this._forecastData);
  //console.log(this.forecastDataJson[0]);
    // this.forecastDataJson = this._meteoService.getForecastValues();


    /*this._httpClient.get(this._forecastUrl).subscribe(
      (data) => {
        console.log('Request sent successfully !');

        this._data = JSON.stringify(data);
        this.dataJson = JSON.parse(this._data);

        console.log(this.dataJson[0].day);
        },
      (error) => {
        console.log('Error ! : ' , error);
      }
    );*/
  }
}
