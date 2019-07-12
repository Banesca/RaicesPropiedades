import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

import { SuscritComponent, TrackCapsDirective } from './suscrit/suscrit.component';
import { ContactComponent } from './contact/contact.component';
import { ServicesComponent } from './services/services.component';

@NgModule({
  declarations: [ 
    SuscritComponent,
    ContactComponent,
    ServicesComponent,
    TrackCapsDirective
  ],
  imports: [
    CommonModule,
    FormsModule,
    RouterModule,
    ReactiveFormsModule
  ],
  exports:[
    SuscritComponent,
    ContactComponent,
    ServicesComponent
  ]
})
export class HomeModule { }
