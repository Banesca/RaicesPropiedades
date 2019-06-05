import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { OfficeComponent } from './office/office.component';


const officesRoutes: Routes = [
  { path: '', component: OfficeComponent },
];



@NgModule({
  imports: [RouterModule.forChild(officesRoutes)],
  exports: [RouterModule]
})
export class OfficesRoutingModule { }