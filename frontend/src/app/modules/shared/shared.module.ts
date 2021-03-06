import { LOCALE_ID, NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { registerLocaleData } from '@angular/common';
import { RouterModule } from '@angular/router';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';


import { ArticlesComponent } from './components/articles/articles.component';
import { HeaderComponent } from './components/header/header.component';
import { FooterComponent } from './components/footer/footer.component';
import { HeaderBottomComponent } from './components/header-bottom/header-bottom.component';
import { BlogAuthorComponent } from './components/blog-author/blog-author.component';
import { BlogBodyComponent } from './components/blog-body/blog-body.component';
import { BlogHeaderComponent } from './components/blog-header/blog-header.component';
import { SearchComponent } from './components/search/search.component';
import { BlogPaginationComponent } from './components/blog-pagination/blog-pagination.component';
import { PropiertysListComponent } from './components/propiertys-list/propiertys-list.component';
import { PropiertysCarouselComponent } from './components/propiertys-carousel/propiertys-carousel.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';


import localePy from '@angular/common/locales/es-PY';
import localePt from '@angular/common/locales/pt';
import localeEn from '@angular/common/locales/en';
import { TransactionModalComponent } from './components/transaction-modal/transaction-modal.component';
import { MatCardModule } from '@angular/material/card';
import { MatIconModule } from '@angular/material/icon';
import { PropiertysGridComponent } from './components/propiertys-grid/propiertys-grid.component';
import { MatChipsModule } from '@angular/material/chips';
import { CarouselComponent } from './components/carousel/carousel.component';
import { SlickCarouselModule } from 'ngx-slick-carousel';
import { PagoModalComponent } from './components/pago-modal/pago-modal.component';


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
    HeaderBottomComponent,
    BlogAuthorComponent,
    BlogBodyComponent,
    BlogHeaderComponent,
    SearchComponent,
    BlogPaginationComponent,
    TransactionModalComponent,
    PropiertysListComponent,
    PropiertysGridComponent,
    CarouselComponent,
    PagoModalComponent
  ],
  exports: [
    PropiertysCarouselComponent,
    FooterComponent,
    ArticlesComponent,
    HeaderBottomComponent,
    BlogAuthorComponent,
    BlogBodyComponent,
    BlogHeaderComponent,
    SearchComponent,
    BlogPaginationComponent,
    HeaderComponent,
    TransactionModalComponent,
    PropiertysListComponent,
    PropiertysGridComponent,
    CarouselComponent,
    PagoModalComponent
  ],
  imports: [
    CommonModule,
    RouterModule,
    NgbModule,
    FormsModule,
    ReactiveFormsModule,
    MatCardModule,
    MatIconModule,
    MatChipsModule,
    SlickCarouselModule
  ],
  entryComponents: [TransactionModalComponent,PagoModalComponent],
  providers: [{ provide: LOCALE_ID, useValue: "es" }]
})
export class SharedModule { }
