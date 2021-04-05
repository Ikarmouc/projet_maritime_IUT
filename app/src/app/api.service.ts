import { Injectable } from '@angular/core';
import { Musee } from './model/musee.model';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ApiService {

  constructor(private httpClient: HttpClient) { }

  getImageMusee(): Observable<any> {
    return this.httpClient.get<string>('http://localhost:9999/api/musee/image');
  }

  getHoraireOuverture(): Observable<any> {
    return this.httpClient.get<string>('http://localhost:9999/api/musee/horaireOuverture');
  }

  getHoraireFermeture(): Observable<any> {
    return this.httpClient.get<string>('http://localhost:9999/api/musee/horaireFermeture');
  }

  getJoursFermeture(): Observable<any> {
    return this.httpClient.get<string>('http://localhost:9999/api/musee/joursFermeture');
  }
}
