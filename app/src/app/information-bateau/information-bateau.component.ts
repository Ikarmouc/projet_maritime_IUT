import {Component, NgModule, OnInit} from '@angular/core';
import {InformationBateauxService} from './information-bateaux.service';
import {ActivatedRoute} from '@angular/router';
import {HttpClient} from '@angular/common/http';
import {TemoignagesModel} from '../../Model/Temoignages.model';
import {HistoireBateau} from '../../Model/HistoireBateau.model';


@Component({
  selector: 'app-information-bateau',
  templateUrl: './information-bateau.component.html',
  styleUrls: ['./information-bateau.component.css']
})

export class InformationBateauComponent implements OnInit {
  public dataTemoignage: Array<any> = [];
  public dataHistorique: Array<any> = [];
  public dataBateau: Array<any> = [];
  nom: '';
  constructor(private InformationBateauService: InformationBateauxService, private route: ActivatedRoute, private httpClient: HttpClient ) {
    this.nom = this.route.snapshot.params.nom;
    this.InformationBateauService = new InformationBateauxService(httpClient);
  }
  ngOnInit(): void {
    // this.InformationBateauService.getTemoignages(this.nom).subscribe(data => (this.dataTemoignage = data));
    // console.log('Result : ' + this.dataTemoignage + data);
    this.InformationBateauService.getTemoignages(this.nom).subscribe(
      (data) => {
        // Dans le cas où la requête passe, traitement des données
        console.log('Request sent successfully !' , data);
        this.dataTemoignage.push(data);
        console.log(this.dataTemoignage);
      },
      (error) => {
        // Dans le cas où une erreur survient (souvent due aux appels de l'api openweatherapi [60/min maximum])
        console.log('Error ! : ' , error);
      }
    );
    this.InformationBateauService.getHistoire(this.nom).subscribe(
      (data) => {
        // Dans le cas où la requête passe, traitement des données
        console.log('Request sent successfully !' , data);
        this.dataHistorique.push(data);
      },
      (error) => {
        // Dans le cas où une erreur survient (souvent due aux appels de l'api openweatherapi [60/min maximum])
        console.log('Error ! : ' , error);
      }
    );

    this.InformationBateauService.getBateau(this.nom).subscribe(
      (data) => {
        // Dans le cas où la requête passe, traitement des données
        console.log('Request sent successfully !' , data);
        this.dataBateau.push(data);
      },
      (error) => {
        // Dans le cas où une erreur survient (souvent due aux appels de l'api openweatherapi [60/min maximum])
        console.log('Error ! : ' , error);
      }
    );
    /*
    this.InformationBateauService.getTemoignages(this.nom);
    this.dataTemoignage.push(InformationBateauxService);
    */
  }

}
