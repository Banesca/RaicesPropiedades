import { Component, OnInit } from '@angular/core';
import { IConfigG } from "src/app/servicios/interfaces.index";
import { ConfiguracionGeneralService, SucursalesService } from "src/app/servicios/servicios.index";

@Component({
  selector: 'app-about',
  templateUrl: './about.component.html',
  styleUrls: ['./about.component.scss']
})

export class AboutComponent implements OnInit {
  mCategoria = {configGeneral:{}} as IConfigG;

  
  constructor(private _ConfiguracionGeneral: ConfiguracionGeneralService,private _SucursalesService: SucursalesService) { 

    this.mCategoria;
    this.getAll();
  }

  ngOnInit() {
  }

  getAll() {
    this._ConfiguracionGeneral
      .All()
      .then(data => {
        this.mCategoria = data;
        console.log(this.mCategoria.configGeneral.celular1);
      })
      .catch(error => {
        console.log(this.mCategoria);
      });
  }
}

