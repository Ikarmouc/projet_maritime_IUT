import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import {MenuBasComponent} from './menu-bas/menu-bas.component';

const routes: Routes = [

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
