import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { SuscritComponent } from './suscrit/suscrit.component';
import { ContactComponent } from './contact/contact.component';
import { ServicesComponent } from './services/services.component';

@NgModule({
  declarations: [ 
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
    SuscritComponent,
    ContactComponent,
    ServicesComponent
  ]
})
export class HomeModule { }
