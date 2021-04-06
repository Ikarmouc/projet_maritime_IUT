import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { MeteoComponent } from './meteo/meteo.component';
import {InformationBateauComponent} from './information-bateau/information-bateau.component';
import {MenuBasComponent} from './menu-bas/menu-bas.component';
import {HomeComponent} from './home/home.component';

const routes: Routes = [
  {
    path : 'app/bateaux/infosBateau/:nom',
    component : InformationBateauComponent,
  },
<<<<<<< HEAD
  { path: 'meteo3j',
    component: MeteoComponent},
=======
  {
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
>>>>>>> 9f3e799a33633a402a5f8981214bc0c303610452
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
