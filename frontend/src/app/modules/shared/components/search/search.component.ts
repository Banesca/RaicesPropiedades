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
  montos: number[] = montos;
  selectedMinimo: Number | string;
  selectedMaximo: Number | string;
  selectedPartido: any;
  // selectedLocalidad: any;
  _unknowns: string[] = unknown;
  // selectedBarrio: any;
  //ubication

  // regiones: any=[];
  provinces: any = [];
  partidos: any = [];
  // localidades: any=[];
  // ubicaciones: any;
  // barrios: any;

  //

  constructor(
    private _ArticuloService: ArticuloService,
    private router: Router
  ) {
    this.getAll();
    this.moneda = Monedas.empy();
    this.tipo = TipoPropiedad.empy();
    this.operation = TOperaion.empy();
    this.selectedProvince = { nombre: "Indistinto" };
    this.selectedPartido = { nombre: "Indistinto" };
    // this.selectedRegion = { nombre: "Indistinto" };
    // this.selectedLocalidad = { nombre: "Indistinto" };
    // this.selectedBarrio = { nombre: "Indistinto" };
    this.selectedMinimo = "Indistinto";
    this.selectedMaximo = "Indistinto";
  }

  ngOnInit() {}

  getAll() {
    this.gMonedas();
    this.gOrientacion();
    this.gTipoPropiedad();
    this.gTipoOperacion();
    this.getProvinces();
    // this.getProvinces();
    // this.getUbication();
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
    this._ArticuloService
      .getOrientacion()
      .then(data => {
        this.mOrientacion = data;
      })
      .catch(error => {
        console.log(error);
      });
  }

  getProvinces() {
    this._ArticuloService
      .getProvinces()
      .then(response => {
        this.provinces = response.Provincias;
        console.log("ubicaciones:", this.provinces);
      })
      .catch(error => {
        console.log(error);
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
    this.selectedProvince.nombre = value.nombre;
    console.log(value);
    this._ArticuloService
      .getPartidos({ idProvincia: value.id })
      .then(response => {
        this.selectedPartido.nombre = "Indistinto";
        this.partidos = response.Partidos;
      })
      .catch(error => {
        console.log(error);
      });
    // this.partidos = value.partidos;
  };
  
  setPartido = (value: any): void => {
    console.log("setPartido:",value);
    this.selectedPartido.nombre = value.nombre;
  };
  // setRegion = (data: any): void => {
  //   this.selectedRegion = data;
  //   this._ArticuloService
  //     .getLocalidades({ idRegion: data.id})
  //     .then(response => {
  //       this.localidades = response.Localidades;
  //     })
  //     .catch(error => {
  //       console.log(error);
  //     });
  // };

  setMnimo = (data: number): void => {
    this.selectedMinimo = data;
  };

  setMaximo = (data: number): void => {
    this.selectedMaximo = data;
  };

  // setLocalidad = (data: any): void => {
  //   this.selectedLocalidad = data;
  //   // this.barrios = data.barrios;
  // };

  setBarrio = (data: any) => {
    // this.selectedBarrio = data;
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
