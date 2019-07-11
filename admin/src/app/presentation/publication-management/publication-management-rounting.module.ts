import { Routes, RouterModule } from '@angular/router';
import { NgModule } from '@angular/core';
import { IndexComponent } from './index/index.component';
import { ListComponent } from './list/list.component';
import { FormComponent } from './form/form.component';

const routes: Routes = [
   {
      path: '',
      component: IndexComponent,
      children:[{
         path: '',
         component: ListComponent
      },{
         path: 'form',
         component: FormComponent
      },{
         path: 'form/:id',
         component: FormComponent
      }]
   }
];

@NgModule({
   imports: [RouterModule.forChild(routes)],
   exports: [RouterModule]
})
export class PublicationManagementRoutingModule { }
