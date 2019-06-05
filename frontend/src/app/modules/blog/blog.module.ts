import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SharedModule } from '../shared/shared.module';
import {NgbModule} from '@ng-bootstrap/ng-bootstrap';
import { ReactiveFormsModule } from '@angular/forms';
import { FormsModule } from '@angular/forms';




import { BlogComponent } from './blog.component';

import { SearchBlogComponent } from './components/search-blog/search-blog.component';

//Routes
import { BlogRoutingModule } from './blog-routing.module';


@NgModule({
  declarations: [
    BlogComponent,
    SearchBlogComponent,
  ],
  exports: [    
  ],
  imports: [
    CommonModule,
    BlogRoutingModule,
    SharedModule,
    NgbModule,
    ReactiveFormsModule,
    FormsModule
    ]
})
export class BlogModule { }
