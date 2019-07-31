import { Injectable } from "@angular/core";
import { MatDialog } from "@angular/material";
import { ConfirmComponent } from "../confirm/confirm.component";

@Injectable({
  providedIn: "root"
})
export class ConfirmService {
  constructor(private dialog: MatDialog) {}

  openConfirmDialog = obj => {
   return this.dialog.open(ConfirmComponent, {
      width: "450px",
      height: "200px",
      disableClose: false,
      data: obj
    });
  };
}
