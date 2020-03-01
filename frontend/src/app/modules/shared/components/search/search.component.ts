import { Component, OnInit, Input } from "@angular/core";
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
  habitantes: number;
  _unknowns: string[] = unknown;
  //ubication

  provinces: any = [];
  partidos: any = [];
  localidades: any = [];
  barrios: any = [];

  validateMonto: boolean = false;
  selectedCalle: any;
  calles: any;
  constructor(
    private articuloService: ArticuloService,
    private router: Router
  ) {}

  ngOnInit() {
    this.getAll();
    this.emptyValues();
  }
  emptyValues() {
    this.moneda = Monedas.empy();
    this.tipo = TipoPropiedad.empy();
    this.operation = TOperaion.empy();
    // provincias, partidos,localidades y barrios
    this.selectedProvince = { id: null, nombre: "Provincia" };
    this.selectedPartido = { id: null, nombre: "Partido" };
    this.selectedLocalidad = { id: null, nombre: "Localidad" };
    this.selectedBarrio = { id: null, nombre: "Barrio" };
    this.selectedMinimo = null;
    this.selectedMaximo = null;
    this.habitantes = null;
  }
  getAll() {
    this.gMonedas();
    this.gOrientacion();
    this.gTipoPropiedad();
    this.gTipoOperacion();
    this.getProvinces();
  }

  gMonedas() {
    this.articuloService
      .getMonedas()
      .then(data => {
        this.mMonedas = data;
      })
      .catch(error => {
        console.log(error);
      });
  }

  gOrientacion() {
    this.articuloService
      .getOrientacion()
      .then(data => {
        this.mOrientacion = data;
      })
      .catch(error => {
        console.log(error);
      });
  }

  getProvinces() {
    this.articuloService
      .getProvinces()
      .then(response => {
        this.provinces = response.Provincias;
      })
      .catch(error => {
        console.log(error);
      });
  }

  gTipoPropiedad() {
    this.articuloService
      .getTipoPropiedad()
      .then(data => {
        this.mTipoPropiedad = data;
      })
      .catch(error => {
        console.log(error);
      });
  } 

  gCalle(id) {
    this.articuloService
      .getCalle(id)
      .then(data => {
        this.mTipoPropiedad = data;
      })
      .catch(error => {
        console.log(error);
      });
  }


  gTipoOperacion() {
    this.articuloService
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
    this.articuloService
      .getPartidos({ fk_provincia: value.id })
      .then(response => {
        this.selectedPartido.nombre = "Partido";
        this.partidos = response.Partidos;
      })
      .catch(error => {
        console.log(error);
      });
  };

  setPartido = (value: any): void => {
    this.selectedPartido = value;
    this.articuloService
      .getLocalidades({ fk_idPartido: value.id })
      .then(response => {
        this.selectedLocalidad.nombre = "Localidad";
        this.localidades = response.Localidades;
      })
      .catch(error => {
        console.log(error);
      });
  };
  setLocalidad = (value: any): void => {
    this.selectedLocalidad = value;
    this.articuloService
      .getBarrios({ idLocalidad: value.id })
      .then(response => {
        this.selectedBarrio.nombre = "Barrio";
        this.barrios = response.Barrios;
      })
      .catch(error => {
        console.log(error);
      });
  };
  setBarrio = (data: any) => {
    this.selectedBarrio = data;
    this.articuloService
      .getCalle({ idLocalidad: this.selectedBarrio.id })
      .then(response => {
        this.selectedBarrio.nombre = "Barrio";
        this.calles = response.Calles;
      })
      .catch(error => {
        console.log(error);
      });
  };

  setCalle = (data:any) => {
    this.selectedCalle = data;
  }
  // setMnimo = (data: number): void => {
  //   this.selectedMinimo = data;
  // };

  // setMaximo = (data: number): void => {
  //   this.selectedMaximo = data;
  // };
  // ------------------------

  searchFilter() {
    if (
      (this.selectedMinimo == null && this.selectedMaximo != null) ||
      (this.selectedMaximo == null && this.selectedMinimo != null)
    ) {
      this.validateMonto = true;
    } else {
      this.validateMonto = false;
      this.articuloService.search.next(true);
      this.articuloService.filter.next({
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
      });
      this.emptyValues();
    }
  }
}
