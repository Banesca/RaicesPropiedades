// https://v6.material.angular.io/components/categories
import {MatButtonModule, MatCheckboxModule, MatProgressSpinnerModule, MatProgressBarModule, MatFormFieldModule, MatInputModule, MatTooltipModule, MatBadgeModule, MatRadioModule} from '@angular/material';
 import { NgModule } from '@angular/core';

 @NgModule({
   imports: [
       MatButtonModule, 
      MatCheckboxModule,
       MatProgressSpinnerModule,
       MatProgressBarModule,
       MatFormFieldModule,
       MatInputModule,
       MatTooltipModule,
       MatBadgeModule,
       MatRadioModule    
     ],
   exports: [
       MatButtonModule, 
       MatCheckboxModule,
       MatProgressSpinnerModule,
       MatProgressBarModule,
       MatFormFieldModule,
       MatInputModule,
       MatTooltipModule,
       MatBadgeModule,
       MatRadioModule
     ]
 })
 export class MaterialUiModule { }