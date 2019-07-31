import { Component, OnInit, Inject } from '@angular/core';
import {MAT_DIALOG_DATA , MatDialogRef} from '@angular/material'

@Component({
  selector: 'app-confirm',
  templateUrl: './confirm.component.html',
  styleUrls: ['./confirm.component.css']
})
export class ConfirmComponent implements OnInit {

  constructor(@Inject(MAT_DIALOG_DATA) public data,
  public dialogRef: MatDialogRef<ConfirmComponent>
  ) { }

  ngOnInit() {
  }

}
