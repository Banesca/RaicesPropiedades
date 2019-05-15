import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { HeaderBottomComponent } from './header-bottom/header-bottom.component';
import { SuscritComponent } from './suscrit/suscrit.component';
import { ContactComponent } from './contact/contact.component';
import { DemosComponent } from './demos/demos.component';
import { ServicesComponent } from './services/services.component';

@NgModule({
  declarations: [ 
    HeaderBottomComponent,
    SuscritComponent,
    ContactComponent,
    DemosComponent,
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
    DemosComponent,
    ServicesComponent
  ]
})
export class HomeModule { }
