import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LayoutComponent } from './layout/layout.component';


const articleRoutes: Routes = [
  { path: ':ruta', component: LayoutComponent },
];



@NgModule({
  imports: [RouterModule.forChild(articleRoutes)],
  
  exports: [RouterModule]
})
export class ArticleRoutingModule { }