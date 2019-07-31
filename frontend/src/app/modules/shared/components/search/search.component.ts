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
import { Observable, of } from "rxjs";

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
  selectedLocalidad: any;
  selectedBarrio: any;
  //ubication

  ubicaciones: any;
  partidos: any;
  localidades: any;
  barrios: any;

  //

  constructor(
    private _ArticuloService: ArticuloService,
    private router: Router
  ) {
    this.getAll();
    this.moneda = Monedas.empy();
    this.tipo = TipoPropiedad.empy();
    this.operation = TOperaion.empy();
    this.selectedProvince = { descripcion: "Indistinto" };
    this.selectedCiudad = { descripcion: "Indistinto" };
    this.selectedLocalidad = { descripcion: "Indistinto" };
    this.selectedBarrio = { descripcion: "Indistinto" };
    this.selectedMinimo = "Indistinto";
    this.selectedMaximo = "Indistinto";
  }

  ngOnInit() {}

  getAll() {
    this.gMonedas();
    this.gOrientacion();
    this.gTipoPropiedad();
    this.gTipoOperacion();
    this.getUbication();
  }

  gMonedas() {
    this._ArticuloService
      .getMonedas()
      .then(data => {
        this.mMonedas = data;
      })
      .catch(error => {
        console.log(error);
      });
  }

  gOrientacion() {
    this._ArticuloService.getOrientacion().then(data => {
      this.mOrientacion = data;
    });
  }

  getUbication() {
    this._ArticuloService.getUbication().then(ubication => {
      this.ubicaciones = ubication;
    });
  }

  gTipoPropiedad() {
    this._ArticuloService
      .getTipoPropiedad()
      .then(data => {
        this.mTipoPropiedad = data;
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
    this.partidos = value.partidos;
  };

  setCiudad = (data: any): void => {
    this.selectedCiudad = data;
    this.localidades = data.localidades;
  };

  setMnimo = (data: number): void => {
    this.selectedMinimo = data;
  };

  setMaximo = (data: number): void => {
    this.selectedMaximo = data;
  };

  setLocalidad = (data: any): void => {
    this.selectedLocalidad = data;
    this.barrios = data.barrios;
  };

  setBarrio = (data: any) => {
    this.selectedBarrio = data;
  };

  // ------------------------

  searchFilter() {
    const array: any[] = [];
    if (this.tipo.descripcion !== "Seleccione") {
      array.push(this.tipo.descripcion);
    }

    if (this.moneda.moneda !== "Seleccione") {
      array.push(this.moneda.moneda);
    }

    if (this.operation.descripcion !== "Seleccione") {
      array.push(this.operation.descripcion);
    }

    if (this.selectedMinimo !== "Indistinto") {
      array.push({ montoMinimo: this.selectedMinimo });
    }

    if (this.selectedMaximo !== "Indistinto") {
      array.push({ montoMaximo: this.selectedMaximo });
    }

    this._ArticuloService.search.next(true);
    this._ArticuloService.filter.next(array);
  }
}
