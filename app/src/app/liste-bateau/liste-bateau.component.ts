import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { ApiService } from '../api.service';
import { ListeBateauService } from './liste-bateau.service';

@Component({
  selector: 'app-liste-bateau',
  templateUrl: './liste-bateau.component.html',
  styleUrls: ['./liste-bateau.component.css']
})
export class ListeBateauComponent implements OnInit {

  public bateaux: Array<any> = [];
  constructor(private apiService: ApiService) { }

  ngOnInit(): void {
    this.apiService.getListeBateaux().subscribe(data => {
      this.bateaux = data;
      this.bateaux = Array.of(this.bateaux);
    });
  }

}
