import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
<<<<<<< HEAD

=======
import { HttpClientModule } from '@angular/common/http';
import { AppRoutingModule } from './app-routing.module';
>>>>>>> f7b543cb455fa4c9d6aac8d4ea7a1232a6afe79b
import { AppComponent } from './app.component';
import { MapComponent } from './map/map.component';
import { HomeComponent } from './home/home.component';
import { InformationBateauComponent } from './information-bateau/information-bateau.component';
import { MenuBasComponent } from './menu-bas/menu-bas.component';


import { HttpClientModule } from '@angular/common/http';
import { MeteoComponent } from './meteo/meteo.component';

import { AppRoutingModule } from './app-routing.module';

@NgModule({
  declarations: [
    AppComponent,
<<<<<<< HEAD
    MeteoComponent,
=======
    MapComponent
>>>>>>> f7b543cb455fa4c9d6aac8d4ea7a1232a6afe79b
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
<<<<<<< HEAD
    AppRoutingModule
=======
    AppRoutingModule,
    HomeComponent,
    InformationBateauComponent,
    MenuBasComponent,
>>>>>>> f7b543cb455fa4c9d6aac8d4ea7a1232a6afe79b
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
