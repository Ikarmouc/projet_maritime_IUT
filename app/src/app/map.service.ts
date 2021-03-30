import { Injectable } from '@angular/core';
import * as mapboxgl from 'mapbox-gl';
import { environment } from '../environments/environment';

@Injectable({
  providedIn: 'root'
})

export class MapService {
  map!: mapboxgl.Map;
  style = 'mapbox://styles/mapbox/streets-v11';
  lat = 46.1558;
  lng = -1.1532;
  zoom = 13;
  constructor() {
    (mapboxgl as any).accessToken = environment.mapbox.accessToken;
  }
  buildMap(): void {
    this.map = new mapboxgl.Map({
      container: 'map',
      style: this.style,
      zoom: this.zoom,
      center: [this.lng, this.lat]
    });
    this.map.addControl(new mapboxgl.NavigationControl());
  }
}