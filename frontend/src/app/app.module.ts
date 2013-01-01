import { BrowserModule } from '@angular/platform-browser';
import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { SharedModule } from './modules/shared/shared.module';
import { AppRoutingModule } from './app-routing.module';
import { ServiciosModule } from './servicios/servicios.module';

import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { AppComponent } from './app.component';
import { HomeComponent } from './page/home/home.component';
import { NopagefoundComponent } from './page/nopagefound/nopagefound.component';

import { HomeModule } from './modules/home/home.module';
import { ArticleModule } from './modules/blog/modules/article/article.module';
import { AboutComponent } from './page/about/about.component';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    NopagefoundComponent,
    AboutComponent
  ],
  imports: [
   
    BrowserModule,
    AppRoutingModule,
    CommonModule,
    SharedModule,
    HomeModule,
    ArticleModule,
    ServiciosModule,
    NgbModule,
    BrowserAnimationsModule

  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
