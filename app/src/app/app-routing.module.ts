import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import {InformationBateauComponent} from './information-bateau/information-bateau.component';

const routes: Routes = [
  {
    path : 'app/bateaux/infosBateau/:nom',
    component : InformationBateauComponent, },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
