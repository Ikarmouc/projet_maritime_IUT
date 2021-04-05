import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { HttpClientModule } from '@angular/common/http';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import { InformationBateauComponent } from './information-bateau/information-bateau.component';
import { MenuBasComponent } from './menu-bas/menu-bas.component';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    InformationBateauComponent,
    MenuBasComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
