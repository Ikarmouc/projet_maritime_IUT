import { Injectable } from '@angular/core';
import {HttpClient } from '@angular/common/http';
import {Bateau} from '../../Model/Bateau.model';
import {HistoireBateau} from '../../Model/HistoireBateau.model';
import {TemoignagesModel} from '../../Model/Temoignages.model';
import {Observable} from 'rxjs';

@Injectable({
  providedIn: 'root'
})

export class InformationBateauxService
{
  defaultUrl = 'http://localhost:9999/api/bateaux/';

  constructor(private http: HttpClient ){}

  getTemoignages(nomBateau: string): Observable<TemoignagesModel[]>
  {
    const urlTemoignage = this.defaultUrl + nomBateau + '/temoignage';
    return this.http.get<TemoignagesModel[]>(urlTemoignage);
  }

  getHistoire(nomBateau: string): Observable<HistoireBateau>
  {

    return this.http.get<HistoireBateau>(this.defaultUrl + nomBateau + '/historique');
  }

  getBateau(nomBateau: string): Observable<Bateau>
  {
    return this.http.get<HistoireBateau>(this.defaultUrl + nomBateau + '/informations');

  }

}


