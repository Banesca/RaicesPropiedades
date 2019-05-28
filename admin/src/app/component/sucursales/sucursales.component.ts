import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder } from '@angular/forms';

@Component({
  selector: 'app-sucursales',
  templateUrl: './sucursales.component.html',
  styleUrls: ['./sucursales.component.css']
})
export class SucursalesComponent implements OnInit {

  constructor(
    private fb:FormBuilder
  ) { }
  myForm : FormGroup
  ngOnInit() {
    this.myForm = this.fb.group({
      nombre:[''],
      numeroContacto:[''],
      email:[''],
      direccion:['']
    })
  }

}
