import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
<<<<<<< HEAD
import { MeteoComponent } from './meteo/meteo.component';

const routes: Routes = [
  { path: 'meteo3j', component: MeteoComponent},
=======
import {InformationBateauComponent} from './information-bateau/information-bateau.component';
import {MenuBasComponent} from './menu-bas/menu-bas.component';

const routes: Routes = [
  {
    path : 'app/bateaux/infosBateau/:nom',
    component : InformationBateauComponent,
  },
>>>>>>> f7b543cb455fa4c9d6aac8d4ea7a1232a6afe79b
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
export class AppRoutingModule { }
