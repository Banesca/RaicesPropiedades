import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import { LayoutComponent } from "./layout/layout.component";
import { ArticleRoutingModule } from "./article-routing.module";
import { SharedModule } from "src/app/modules/shared/shared.module";
import { NgbModule } from "@ng-bootstrap/ng-bootstrap";
import { ReactiveFormsModule } from "@angular/forms";
import { FormsModule } from "@angular/forms";

@NgModule({
  declarations: [LayoutComponent],
  imports: [
    CommonModule,
    ArticleRoutingModule,
    SharedModule,
    NgbModule,
    ReactiveFormsModule,
    FormsModule
  ]
})
export class ArticleModule {}
