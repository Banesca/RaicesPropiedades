import { Component, OnInit } from "@angular/core";
import { ArticuloService } from "src/app/servicios/servicios.index";
import {
  IMonedas,
  IOrientacion,
  ITipoPropiedad,
  Monedas,
  TipoPropiedad,
  TipoOperaion,
  TOperaion
} from "src/app/servicios/interfaces.index";

import { provincias, montos, unknown } from "./mockData";
import { Router } from "@angular/router";

@Component({
  selector: "app-search",
  templateUrl: "./search.component.html",
  styleUrls: ["./search.component.scss"]
})
export class SearchComponent implements OnInit {
  mMonedas: IMonedas;
  mOrientacion: IOrientacion;
  mTipoPropiedad: ITipoPropiedad;
  tipo: ITipoPropiedad;
  moneda: IMonedas;
  tipoOperation: TipoOperaion[];
  operation: TipoOperaion;
  arrayProvinces: any = provincias;
  selectedProvince: any;
  selectedCiudad: any;
  montos: number[] = montos;
  selectedMinimo: Number | string;
  selectedMaximo: Number | string;
  _unknowns: string[] = unknown;

  constructor(
    private _ArticuloService: ArticuloService,
    private router: Router
  ) {
    this.getAll();
    this.moneda = Monedas.empy();
    this.tipo = TipoPropiedad.empy();
    this.operation = TOperaion.empy();
    this.selectedProvince = { descripcion: "Seleccione" };
    this.selectedCiudad = { descripcion: "Seleccione" };
    this.selectedMinimo = "Indistinto";
    this.selectedMaximo = "Indistinto";
  }

  ngOnInit() {}

  getAll() {
    this.gMonedas();
    this.gOrientacion();
    this.gTipoPropiedad();
    this.gTipoOperacion();
  }

  gMonedas() {
    this._ArticuloService
      .getMonedas()
      .then(data => {
        this.mMonedas = data;
        console.log("monedas", this.mMonedas);
      })
      .catch(error => {
        console.log(error);
      });
  }

  gOrientacion() {
    this._ArticuloService.getOrientacion().then(data => {
      this.mOrientacion = data;
      console.log("hola", this.mOrientacion);
    });
  }

  gTipoPropiedad() {
    this._ArticuloService
      .getTipoPropiedad()
      .then(data => {
        this.mTipoPropiedad = data;
        console.log(this.mTipoPropiedad);
      })
      .catch(error => {
        console.log(error);
      });
  }

  gTipoOperacion() {
    this._ArticuloService
      .getTipoOperacion()
      .then(operation => {
        this.tipoOperation = operation;
      })
      .catch(error => {
        console.log(error);
      });
  }

  // -------- Set --------

  setTipo(value: ITipoPropiedad) {
    this.tipo = value;
  }
  setMoneda(value: IMonedas) {
    this.moneda = value;
  }

  setTipoOperation(value: TipoOperaion): void {
    this.operation = value;
  }

  setProvince = (value: any): void => {
    this.selectedProvince = value;
  };

  setCiudad = (data: any): void => {
    this.selectedCiudad = data;
  };

  setMnimo = (data: number): void => {
    this.selectedMinimo = data;
  };

  setMaximo = (data: number): void => {
    this.selectedMaximo = data;
  };

  setUnknown = (data: string): void => {};

  // ------------------------

  searchFilter() {
    this._ArticuloService.filter = [];
    if (this.tipo.descripcion !== "Seleccione") {
      console.log("entro aca");
      this._ArticuloService.filter.push(this.tipo);
    }

    if (this.moneda.moneda !== "Seleccione") {
      this._ArticuloService.filter.push(this.moneda);
    }

    if (this.operation.descripcion !== "Seleccione") {
      this._ArticuloService.filter.push(this.operation);
    }

    if (this.selectedMinimo !== "Indistinto") {
      this._ArticuloService.filter.push({ montoMinimo: this.selectedMinimo });
    }

    if (this.selectedMaximo !== "Indistinto") {
      this._ArticuloService.filter.push({ montoMaximo: this.selectedMaximo });
    }

    console.log("asdasdasdasdasd", this._ArticuloService.filter);
  }
}
