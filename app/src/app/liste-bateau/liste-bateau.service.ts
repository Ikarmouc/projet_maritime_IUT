import { Injectable } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Observable} from 'rxjs';
import {Bateau} from '../model/bateau.model';

@Injectable({
  providedIn: 'root'
})
export class ListeBateauService {

  defaultUrl = 'http://localhost:9999/api/musee/listeBateaux';

  constructor(private http: HttpClient) { }

  getUrl(nomBateau: string): Observable<Bateau[]>{
    return this.http.get<Bateau[]>(this.defaultUrl + nomBateau);
  }
}
