import { LOCALE_ID, NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SendCommentModule } from './components/send-comment/send-comment.module';
import { registerLocaleData } from '@angular/common';
import { RouterModule } from '@angular/router';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';


import { ArticlesComponent } from './components/articles/articles.component';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { BlogArticlesComponent } from './components/blog-articles/blog-articles.component';
import { BlogAuthorComponent } from './components/blog-author/blog-author.component';
import { BlogBodyComponent } from './components/blog-body/blog-body.component';
import { BlogHeaderComponent } from './components/blog-header/blog-header.component';
import { CommentsComponent } from './components/comments/comments.component';
import { BlogPaginationComponent } from './components/blog-pagination/blog-pagination.component';
import { PropiertysListComponent } from './components/propiertys-list/propiertys-list.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms'

import localePy from '@angular/common/locales/es-PY';
import localePt from '@angular/common/locales/pt';
import localeEn from '@angular/common/locales/en';
import { TransactionModalComponent } from './components/transaction-modal/transaction-modal.component';
import { PropiertysCarouselComponent } from './components/propiertys-carousel/propiertys-carousel.component';


// registrar los locales con el nombre que quieras utilizar a la hora de proveer
registerLocaleData(localePy, 'es');
registerLocaleData(localePt, 'pt');
registerLocaleData(localeEn, 'en')


@NgModule({
  declarations: [
    PropiertysCarouselComponent,
    HeaderComponent,
    FooterComponent,
    ArticlesComponent,
    BlogArticlesComponent,
    BlogAuthorComponent,
    BlogBodyComponent,
    BlogHeaderComponent,
    CommentsComponent,
    BlogPaginationComponent,
    TransactionModalComponent,
    PropiertysListComponent,
    
  ],
  exports: [
    PropiertysCarouselComponent,
    FooterComponent,
    ArticlesComponent,
    BlogArticlesComponent,
    BlogAuthorComponent,
    BlogBodyComponent,
    BlogHeaderComponent,
    CommentsComponent,
    BlogPaginationComponent,
    HeaderComponent,
    TransactionModalComponent,
    PropiertysListComponent
  ],
  imports: [
    CommonModule,
    SendCommentModule,
    RouterModule,
    NgbModule,
    FormsModule,
    ReactiveFormsModule
  ],
  entryComponents: [TransactionModalComponent],
  providers: [ { provide: LOCALE_ID, useValue: 'es' } ],
})
export class SharedModule { }
