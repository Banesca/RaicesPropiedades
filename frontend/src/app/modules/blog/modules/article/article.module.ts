import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LayoutComponent } from './layout/layout.component';
import { ArticleRoutingModule } from './article-routing.module';
import { SharedModule } from 'src/app/modules/shared/shared.module';

import { AngularFireModule } from 'angularfire2';
import { AngularFirestoreModule } from 'angularfire2/firestore';
import { AngularFireAuthModule } from 'angularfire2/auth';
import { environment } from 'src/environments/environment';

@NgModule({
  declarations: [LayoutComponent],
  imports: [
    CommonModule,
    ArticleRoutingModule,
    SharedModule,
    AngularFireModule.initializeApp(environment.config),
    AngularFirestoreModule,
    AngularFireAuthModule
  ]
})
export class ArticleModule { }
