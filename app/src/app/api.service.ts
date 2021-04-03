import { Injectable } from '@angular/core';
// import { Bateau } from '../../../model/bateau.model';
import { localisationBateau } from '../../../model/localisationBateau.model';
import { HttpClient } from '@angular/common/http';
import {Observable} from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  constructor(private httpClient: HttpClient) {
  }
  getBateaux(): Observable<any> {
    return this.httpClient.get<localisationBateau>('http://localhost:9999/api/musee/bateau');
  }
}
