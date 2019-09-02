import { Component, OnInit } from "@angular/core";
import { ArticuloService } from "src/app/servicios/servicios.index";
import {
  IMonedas,
  IOrientacion,
  ITipoPropiedad,
  Monedas,
  TipoPropiedad,
  TipoOperaion,
  TOperaion,
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
  habitantes: number;
  _unknowns: string[] = unknown;
  //ubication

  provinces: any = [];
  partidos: any = [];
  localidades: any = [];
  barrios: any = [];

  //busqueda avanzada
  advancedSearchForm:boolean=false;
  validateMonto:boolean=false;
  constructor(
    private _ArticuloService: ArticuloService,
    private router: Router
  ) {
    this.getAll();
    this.moneda = Monedas.empy();
    this.tipo = TipoPropiedad.empy();
    this.operation = TOperaion.empy();
    // provincias, partidos,localidades y barrios
    this.selectedProvince = { id: null, nombre: "Indistinto" };
    this.selectedPartido = { id: null, nombre: "Indistinto" };
    this.selectedLocalidad = { id: null, nombre: "Indistinto" };
    this.selectedBarrio = { id: null, nombre: "Indistinto" };
    this.selectedMinimo = "Indistinto";
    this.selectedMaximo = "Indistinto";
    this.habitantes = null;
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
    this.selectedProvince = value;
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
    this.selectedPartido = value;
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
    this.selectedLocalidad = value;
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
    this.selectedBarrio = data;
  };
  setMnimo = (data: number): void => {
    this.selectedMinimo = data;
  };

  setMaximo = (data: number): void => {
    this.selectedMaximo = data;
  };

  // ------------------------

  searchFilter() {
    if (
      (this.selectedMinimo == "Indistinto" &&
        this.selectedMaximo != "Indistinto") ||
      (this.selectedMaximo == "Indistinto" && this.selectedMinimo != "Indistinto")
    ){
      this.validateMonto=true;
    }else{
      this.validateMonto=false;
      let objectFilter = {
        idTipoPropiedad: this.tipo,
        idMonedas: this.moneda,
        idTipoOperaion: this.operation,
        montoMinimo: this.selectedMinimo,
        montoMaximo: this.selectedMaximo,
        idProvincia: this.selectedProvince,
        idPartido: this.selectedPartido,
        idLocalidad: this.selectedLocalidad,
        idBarrio: this.selectedBarrio,
        habitantes: this.habitantes
      };
      this._ArticuloService.search.next(true);
      //    this._ArticuloService.filter.next(filterForm);
      this._ArticuloService.filter.next(objectFilter);
    }
      
  }
  advancedSearch() {
    switch (this.advancedSearchForm) {
      case true:
        this.advancedSearchForm = false;
        this.habitantes=null;
        break;
      case false:
        this.advancedSearchForm = true;
        this.habitantes=0;
        break;
      default:
        break;
    }
  }
}
