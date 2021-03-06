import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import { IndexComponent } from "./index/index.component";
import { ListComponent } from "./list/list.component";
import { FormComponent } from "./form/form.component";
import { PublicationManagementRoutingModule } from "./publication-management-rounting.module";
import { MaterialUiModule } from "src/app/models/material/material-ui.module";
import { ReactiveFormsModule, FormsModule } from "@angular/forms";

@NgModule({
  declarations: [IndexComponent, ListComponent, FormComponent],
  imports: [
    CommonModule,
    PublicationManagementRoutingModule,
    MaterialUiModule,
    ReactiveFormsModule,
    FormsModule
  ],
  exports: [],
  providers: []
})
export class PublicationManagementModule {}
