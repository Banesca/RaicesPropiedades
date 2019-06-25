import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { BlogComponent } from './blog.component';


const blogRoutes: Routes = [
  { path: '', component: BlogComponent },
  { path: 'detail',
  loadChildren: './modules/article/article.module#ArticleModule'
},
];



@NgModule({
  imports: [RouterModule.forChild(blogRoutes,
    )],
  exports: [RouterModule]
})
export class BlogRoutingModule { }