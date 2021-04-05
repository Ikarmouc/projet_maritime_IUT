import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import {InformationBateauComponent} from './information-bateau/information-bateau.component';
import { HomeComponent } from './home/home.component';
import {MenuBasComponent} from './menu-bas/menu-bas.component';

const routes: Routes = [
  {
    path : 'app/bateaux/infosBateau/:nom',
    component : InformationBateauComponent,
  }, {
    path: 'app/musee/home',
    component: HomeComponent,
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
export class AppRoutingModule { }
