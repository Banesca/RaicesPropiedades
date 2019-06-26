import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { BlogComponent } from './blog.component';


const blogRoutes: Routes = [
  { path: '', component: BlogComponent },
  { path: 'detail',
  loadChildren: './modules/article/article.module#ArticleModule'
},
{ path: 'result',
  loadChildren: './modules/search-result/search-result.module#SearchResultModule'
},
];



@NgModule({
  imports: [RouterModule.forChild(blogRoutes,
    )],
  exports: [RouterModule]
})
export class BlogRoutingModule { }