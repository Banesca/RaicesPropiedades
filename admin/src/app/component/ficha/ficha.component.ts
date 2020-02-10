// import { enCRUD } from "./../../misc/enums";
import {Component, OnInit} from '@angular/core';
import { /*NgForm, FormBuilder, Validators, FormArray,*/ FormGroup} from "@angular/forms";
//import { AlertsService } from "../../services/alerts.service";

@Component({
  selector: 'app-ficha',
  templateUrl: './ficha.component.html',
  styleUrls: ['./ficha.component.css']
})

export class FichaComponent implements OnInit {

  public checkForm: FormGroup;

  constructor() { }

  ngOnInit() {
  }

}
