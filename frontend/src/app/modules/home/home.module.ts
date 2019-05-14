import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { RouterModule } from '@angular/router';

import { HeaderBottomComponent } from './header-bottom/header-bottom.component';
import { SuscritComponent } from './suscrit/suscrit.component';
import { ContactComponent } from './contact/contact.component';
import { DemosComponent } from './demos/demos.component';
import { ServicesComponent } from './services/services.component';
import { HeaderComponent } from './header/header.component';

@NgModule({
  declarations: [ 
    HeaderBottomComponent,
    HeaderComponent,
    SuscritComponent,
    ContactComponent,
    DemosComponent,
    ServicesComponent
  ],
  imports: [
    RouterModule,
    CommonModule,
    FormsModule,
    ReactiveFormsModule
  ],
  exports:[
    HeaderBottomComponent,
    HeaderComponent,
    SuscritComponent,
    ContactComponent,
    DemosComponent,
    ServicesComponent
  ]
})
export class HomeModule { }
