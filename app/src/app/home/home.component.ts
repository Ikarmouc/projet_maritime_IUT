import {Component, NgModule, OnInit} from '@angular/core';
import { ApiService } from '../api.service';
import {AppComponent} from "../app.component";

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
  constructor(private apiService: ApiService) { }

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
  }

}
