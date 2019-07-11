import { Component, OnInit } from '@angular/core';
import { IConfigG, ISucursal } from "src/app/servicios/interfaces.index";
import { ConfiguracionGeneralService, SucursalesService } from "src/app/servicios/servicios.index";

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss']
})
export class FooterComponent {
  mCategoria = {configGeneral:{}} as IConfigG;
  mSucusales: ISucursal[];
  public baseUrl: string = 'sucursales'

  
  constructor(private _ConfiguracionGeneral: ConfiguracionGeneralService,private _SucursalesService: SucursalesService) { 

    this.mCategoria;
    this.getAll();
    this.getAllSucusales()
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

  getAllSucusales() {
    this._SucursalesService
      .All()
      .then(data => {
        this.mSucusales = data.suculsales;
        console.log(this.mCategoria);
      })
      .catch(error => {
        console.log(this.mCategoria);
      });
  }

}
