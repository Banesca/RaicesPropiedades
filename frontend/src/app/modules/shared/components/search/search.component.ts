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
  montos: number[] = montos;
  selectedMinimo: Number | string;
  selectedMaximo: Number | string;
  // provincias, partidos,localidades y barrios
  selectedProvince: any;
  selectedPartido: any;
  selectedLocalidad: any;
  selectedBarrio: any;
  _unknowns: string[] = unknown;
  //ubication

  provinces: any = [];
  partidos: any = [];
  localidades: any = [];
  barrios: any = [];

  constructor(
    private _ArticuloService: ArticuloService,
    private router: Router
  ) {
    this.getAll();
    this.moneda = Monedas.empy();
    this.tipo = TipoPropiedad.empy();
    this.operation = TOperaion.empy();
    // provincias, partidos,localidades y barrios
    this.selectedProvince = { nombre: "Indistinto" };
    this.selectedPartido = { nombre: "Indistinto" };
    this.selectedLocalidad = { nombre: "Indistinto" };
    this.selectedBarrio = { nombre: "Indistinto" };
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
    this._ArticuloService
      .getPartidos({ fk_provincia: value.id })
      .then(response => {
        this.selectedPartido.nombre = "Indistinto";
        this.partidos = response.Partidos;
      })
      .catch(error => {
        console.log(error);
      });
  };

  setPartido = (value: any): void => {
    this.selectedPartido.nombre = value.nombre;
    this._ArticuloService
      .getLocalidades({ fk_idPartido: value.id })
      .then(response => {
        this.selectedLocalidad.nombre = "Indistinto";
        this.localidades = response.Localidades;
      })
      .catch(error => {
        console.log(error);
      });
  };
  setLocalidad = (value: any): void => {
    this.selectedLocalidad.nombre = value.nombre;
    this._ArticuloService
      .getBarrios({ idLocalidad: value.id })
      .then(response => {
        this.selectedBarrio.nombre = "Indistinto";
        this.barrios = response.Barrios;
      })
      .catch(error => {
        console.log(error);
      });
  };
  setBarrio = (data: any) => {
    this.selectedBarrio.nombre = data.nombre;
  };
  setMnimo = (data: number): void => {
    this.selectedMinimo = data;
  };

  setMaximo = (data: number): void => {
    this.selectedMaximo = data;
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
