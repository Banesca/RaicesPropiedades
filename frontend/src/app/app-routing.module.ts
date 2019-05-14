import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './page/home/home.component';
import { NopagefoundComponent } from './page/nopagefound/nopagefound.component';

const routes: Routes = [
  { path: '', component: HomeComponent, pathMatch: 'full', },
  {
    path: 'blog',
    loadChildren: './modules/blog/blog.module#BlogModule'
  },
  { path: '**', component: NopagefoundComponent }
];



@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
