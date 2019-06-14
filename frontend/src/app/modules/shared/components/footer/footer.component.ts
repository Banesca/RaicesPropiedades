import { Component, OnInit } from '@angular/core';
import { IConfigG } from "src/app/servicios/interfaces.index";
import { ConfiguracionGeneralService } from "src/app/servicios/servicios.index";

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss']
})
export class FooterComponent {
  mCategoria = {configGeneral:{}} as IConfigG;
  
  constructor(private _ConfiguracionGeneral: ConfiguracionGeneralService) { 

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
