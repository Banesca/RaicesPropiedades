// https://v6.material.angular.io/components/categories
import {MatButtonModule, MatCheckboxModule, MatProgressSpinnerModule, MatProgressBarModule, MatFormFieldModule, MatInputModule, MatTooltipModule, MatBadgeModule, MatRadioModule, MatSelectModule, MatSlideToggleModule, MatStepperModule, MatIconModule} from '@angular/material';
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
       MatRadioModule,
       MatSelectModule,
       MatSlideToggleModule,    
       MatStepperModule,
       MatIconModule
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
       MatRadioModule,
       MatSelectModule,
       MatSlideToggleModule,    
       MatStepperModule,
       MatIconModule
     ]
 })
 export class MaterialUiModule { }