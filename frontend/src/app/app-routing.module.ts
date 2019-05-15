import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './page/home/home.component';
import { AboutComponent } from './page/about/about.component';
import { PropiertysComponent } from './page/propiertys/propiertys.component';
import { NopagefoundComponent } from './page/nopagefound/nopagefound.component';

const routes: Routes = [
  { path: '', component: HomeComponent, pathMatch: 'full', },
  { path: 'nosotros', component: AboutComponent },
  { path: 'oportunidades', component: PropiertysComponent },
  {
    path: 'buscador',
    loadChildren: './modules/blog/blog.module#BlogModule'
  },
  {
    path: 'oportunidades',
    loadChildren: './modules/blog/blog.module#BlogModule'
  },
  {
    path: 'sucursales',
    loadChildren: './modules/blog/blog.module#BlogModule'
  },
  { path: '**', component: NopagefoundComponent }
];



@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
