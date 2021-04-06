import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { MeteoComponent } from './meteo/meteo.component';
import {InformationBateauComponent} from './information-bateau/information-bateau.component';
import { HomeComponent } from './home/home.component';
import {MenuBasComponent} from './menu-bas/menu-bas.component';

const routes: Routes = [
  {
    path : 'app/bateaux/infosBateau/:nom',
    component : InformationBateauComponent,
  }, {
    path: 'meteo3j',
    component: MeteoComponent
  },
  {
    path : 'home',
    component : HomeComponent,
  },
  {
    path : '',
    redirectTo: '/home', pathMatch: 'full'
  },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes)
  ],
  exports: [
    RouterModule
  ],
  declarations: []
})
export class AppRoutingModule {
}
