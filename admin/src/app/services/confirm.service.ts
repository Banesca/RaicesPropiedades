import { Injectable } from "@angular/core";
import { MatDialog } from "@angular/material";
import { ConfirmComponent } from "../confirm/confirm.component";
import { SpinnerComponent } from "../component/spinner/spinner.component";

@Injectable({
  providedIn: "root"
})
export class ConfirmService {
  constructor(private dialog: MatDialog) {}

  openConfirmDialog = obj => {
   return this.dialog.open(ConfirmComponent, {
      width: "450px",
      height: "200px",
      disableClose: true,
      data: obj,
    });
  };


  openSpiner = () => {
    this.dialog.open(SpinnerComponent, {
      disableClose: true,
      panelClass:'my-dialog-container-class'
    })
  }


  closeSpinner=()=>{
    this.dialog.closeAll()
  }
}


  
