import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
<<<<<<< HEAD
=======
import { HttpClientModule } from '@angular/common/http';
import { AppRoutingModule } from './app-routing.module';
>>>>>>> 9f3e799a33633a402a5f8981214bc0c303610452
import { AppComponent } from './app.component';
import { MapComponent } from './map/map.component';
import { HomeComponent } from './home/home.component';
import { InformationBateauComponent } from './information-bateau/information-bateau.component';
import { MenuBasComponent } from './menu-bas/menu-bas.component';
<<<<<<< HEAD
import { HttpClientModule } from '@angular/common/http';
import { MeteoComponent } from './meteo/meteo.component';
import { AppRoutingModule } from './app-routing.module';
=======
import { MeteoComponent } from './meteo/meteo.component';
>>>>>>> 9f3e799a33633a402a5f8981214bc0c303610452

@NgModule({
  declarations: [
    AppComponent,
    MeteoComponent,
    MapComponent,
<<<<<<< HEAD
    MenuBasComponent,
    HomeComponent,
    InformationBateauComponent,
=======
    InformationBateauComponent,
    HomeComponent,
    MenuBasComponent
>>>>>>> 9f3e799a33633a402a5f8981214bc0c303610452
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    AppRoutingModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
