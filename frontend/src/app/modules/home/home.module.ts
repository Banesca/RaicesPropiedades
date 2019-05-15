import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { HeaderBottomComponent } from './header-bottom/header-bottom.component';
import { SuscritComponent } from './suscrit/suscrit.component';
import { ContactComponent } from './contact/contact.component';
import { ServicesComponent } from './services/services.component';

@NgModule({
  declarations: [ 
    HeaderBottomComponent,
    SuscritComponent,
    ContactComponent,
    ServicesComponent
  ],
  imports: [
    CommonModule,
    FormsModule,
    ReactiveFormsModule
  ],
  exports:[
    HeaderBottomComponent,
    SuscritComponent,
    ContactComponent,
    ServicesComponent
  ]
})
export class HomeModule { }
