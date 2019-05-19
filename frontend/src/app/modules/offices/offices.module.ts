
import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SharedModule } from '../shared/shared.module';
import { ReactiveFormsModule } from '@angular/forms';
import { FormsModule } from '@angular/forms';


//Componentes

import { OfficeComponent } from './office/office.component';


//Routes
import { OfficesRoutingModule } from './offices-routing-module';


@NgModule({
  declarations: [
    OfficeComponent,
  ],
  exports: [    
  ],
  imports: [
    CommonModule,
    OfficesRoutingModule,
    SharedModule,
    ReactiveFormsModule,
    FormsModule
    ]
})
export class OfficesModule { }
