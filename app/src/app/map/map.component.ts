import { environment } from '../../environments/environment';
import { Component, OnInit, ChangeDetectorRef } from '@angular/core';
import * as mapboxgl from 'mapbox-gl';
import { ApiService } from '../api.service';
// import { Bateau } from '../../../../model/bateau.model';
// import { LocalisationBateau } from '../../../../model/localisationBateau.model';

@Component({
  selector: 'app-map',
  templateUrl: './map.component.html',
  styleUrls: ['./map.component.css']
})
export class MapComponent implements OnInit {
  map!: mapboxgl.Map;
  style = 'mapbox://styles/mapbox/streets-v11';
  lat = 46.1558;
  lng = -1.1532;
  nomBateau = '';
  bateau = new Array();

  constructor(private apiService: ApiService) { }

  ngOnInit(): void {
    (mapboxgl as any).accessToken = environment.mapbox.accessToken;

    this.map = new mapboxgl.Map({
      container: 'map',
      style: this.style,
      zoom: 13,
      center: [this.lng, this.lat]
    });

    // Add map controls
    this.map.addControl(new mapboxgl.NavigationControl());

    this.apiService.getBateaux().subscribe(data => {
       this.bateau = data;
       for (const value of this.bateau) {
         this.createMarker(Number(value.localisationBateau?.lng), Number(value.localisationBateau?.lat));
       }
    });
    }

  createMarker(lng: number, lat: number): void{
    const marker =  new mapboxgl.Marker({
      draggable: false
    }).setLngLat([this.lng, this.lat])
      .addTo(this.map);
  }
  getMarker(): void{
    for (let i = 0; i < this.bateau.length; i++){
      console.log(this.bateau[i]);
      this.createMarker(this.bateau[i].lat, this.bateau[i].lng);
    }
  }
}
