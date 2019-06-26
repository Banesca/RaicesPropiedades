import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LayoutComponent } from './layout/layout.component';
import { ArticleRoutingModule } from './article-routing.module';
import { SharedModule } from 'src/app/modules/shared/shared.module';


@NgModule({
  declarations: [LayoutComponent],
  imports: [
    CommonModule,
    ArticleRoutingModule,
    SharedModule,
  ]
})
export class ArticleModule { }
