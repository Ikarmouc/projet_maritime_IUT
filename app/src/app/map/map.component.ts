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

  constructor(/*private apiService: ApiService*/) { }

  ngOnInit(): void {
    (mapboxgl as any).accessToken = environment.mapbox.accessToken;

    this.map = new mapboxgl.Map({
      container: 'map',
      style: this.style,
      zoom: 12,
      center: [this.lng, this.lat]
    });

    // Add map controls
    this.map.addControl(new mapboxgl.NavigationControl());

    /*this.apiService.getBateaux().subscribe(data => {
       this.bateau = data;
       for (const value of this.bateau) {
         this.createMarker(Number(value.localisationBateau?.lng), Number(value.localisationBateau?.lat));
       }
    });
    }*/
    const mFrance1 =  new mapboxgl.Marker()
      .setLngLat([-1.1526719475291047, 46.1550791274381])
      .setPopup(new mapboxgl.Popup().setHTML('<h3>France I</h3><p>Bassin des Chalutiers, épi du Slipway</p><p>Visitable : non</p>'))
      .addTo(this.map);

    const mStGilles =  new mapboxgl.Marker()
      .setLngLat([-1.1514955636635846, 46.15054324239581])
      .setPopup(new mapboxgl.Popup().setHTML('<h3>Saint Gilles</h3><p>Slipway</p><p>Visitable : non</p>'))
      .addTo(this.map);

    const mTD6 =  new mapboxgl.Marker()
      .setLngLat([-1.210427132724444, 46.159644932811446])
      .setPopup(new mapboxgl.Popup().setHTML('<h3>Drague à vapeur TD6</h3><p>Base sous-marine, La Pallice</p><p>Visitable : non</p>'))
      .addTo(this.map);

    const mJoshua =  new mapboxgl.Marker()
      .setLngLat([-1.1528050538678627, 46.150696696483244])
      .setPopup(new mapboxgl.Popup().setHTML('<h3>Vedette Duperré</h3><h3>Joshua</h3><p>Musée maritime</p><p>Visitable : non</p>'))
      .addTo(this.map);

    const mAngoumois =  new mapboxgl.Marker()
      .setLngLat([-1.210732947526515, 46.159134473166326])
      .setPopup(new mapboxgl.Popup().setHTML('<h3>Angoumois</h3><p>La Pallice</p><p>Visitable : non</p>'))
      .addTo(this.map);

    const mManuelJoel =  new mapboxgl.Marker()
      .setLngLat([-1.1523281168437387, 46.15231263553285])
      .setPopup(new mapboxgl.Popup().setHTML('<h3>Manuel Joël</h3><p>Quai Sénac de Meilhan</p><p>Visitable : non</p>'))
      .addTo(this.map);

    const mCptFregateLeverger =  new mapboxgl.Marker()
      .setLngLat([-1.1518329535811105, 46.154760246992])
      .setPopup(new mapboxgl.Popup().setHTML('<h3>Capitaine de frégate Leverger</h3><p>Bassin des Chalutiers</p><p>Visitable : non</p>'))
      .addTo(this.map);

  /*getMarker(): void{
    for (let i = 0; i < this.bateau.length; i++){
      console.log(this.bateau[i]);
      this.createMarker(this.bateau[i].lat, this.bateau[i].lng);
    }*/
  }
}
