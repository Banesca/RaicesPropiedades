import { Component, OnInit } from '@angular/core';
import { IConfigG } from "src/app/servicios/interfaces.index";
import { ConfiguracionGeneralService, SucursalesService, ArticuloService } from "src/app/servicios/servicios.index";

@Component({
  selector: 'app-about',
  templateUrl: './about.component.html',
  styleUrls: ['./about.component.scss']
})

export class AboutComponent implements OnInit {
  mCategoria = {configGeneral:{}} as IConfigG;
  searchClicked: boolean;

  
  constructor(
    private _ConfiguracionGeneral: ConfiguracionGeneralService,
    public articuloService: ArticuloService,
    private _SucursalesService: SucursalesService
    ) { 

    this.mCategoria;
    this.getAll();
  }

  ngOnInit() {
    this.articuloService.search.subscribe(data => {
      this.searchClicked = data;
    });
  }

  getAll() {
    this._ConfiguracionGeneral
      .All()
      .then(data => {
        this.mCategoria = data;
      })
      .catch(error => {
        console.log(error);
      });
  }
}

