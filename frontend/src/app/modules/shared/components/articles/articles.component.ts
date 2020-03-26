import { Component, OnInit } from "@angular/core";
import { ArticuloService } from "../../../../servicios/servicios.index";
import { montos } from "../search/mockData";
import {
  ActivatedRoute,
  Router,
  Event,
  NavigationStart
} from "@angular/router";
@Component({
  selector: "app-articles",
  templateUrl: "./articles.component.html",
  styleUrls: ["./articles.component.scss"]
})
export class ArticlesComponent implements OnInit {
  public articulos: any[] = [1, 2, 3, 4, 5, 6, 7, 8, 9];
  public filtro: any;
  public filtro2 = [
    "Alquiler",
    "casas",
    "dolares",
    "Pdo Pillar",
    "Norte GranB Area",
    "country B Cerrado"
  ];
  public baseUrl: string = "/buscador/detail/";
  public recomendation = [1, 2, 3, 4];
  propiedadesInPromise: boolean = false;
  public arbol: any;
  filterData: any;
  objectFilter: any;
  selectedMinimo: Number | string = "mínimo";
  selectedMaximo: Number | string = "máximo";
  montos: number[] = montos;
  minM2: number = null;
  maxM2: number = null;
  montoMinimo: number = null;
  montoMaximo: number = null;
  constructor(
    private router: Router,
    private articuloService: ArticuloService
  ) {}
  getFormData(filterData) {
    const formData = new FormData();
    filterData.forEach(element => {
      formData.append(
        Object.keys(element)[0] + "",
        Object.values(element)[0] + ""
      );
    });
    return formData;
  }
  ngOnInit() {
    let resultsElement = document.getElementById("resultados-busqueda");
    resultsElement.scrollIntoView();
    //console.log("articles.component.ts ngOnInit");
    this.articuloService.search.subscribe(data => {
      //console.log("this.articuloService.search.subscribe:", data);
      if (data) {
        //console.log("true=======");
        //console.log("articles.component.ts searchResult");
        this.propiedadesInPromise = true;
        this.articuloService.filter.subscribe(filterData => {
          if (filterData) {
            console.log("filterData:", filterData);
            //Obtenemos el filtro del buscador
            this.filterData = filterData;
            this.montoMinimo = this.filterData.montoMinimo;
            this.montoMaximo = this.filterData.montoMaximo;
            this.objectFilter = {
              idTipoPropiedad: this.filterData.idTipoPropiedad.idTipoPropiedad,
              idMonedas: this.filterData.idMonedas.idMonedas,
              idTipoOperaion: this.filterData.idTipoOperaion.idTipoOperaion
                ? this.filterData.idTipoOperaion.idTipoOperaion
                : null,
              montoMinimo: this.filterData.montoMinimo,
              montoMaximo: this.filterData.montoMaximo,
              idProvincia: this.filterData.idProvincia.id,
              idPartido: this.filterData.idPartido.id,
              idLocalidad: this.filterData.idLocalidad.id,
              idBarrio: this.filterData.idBarrio.id,
              idCalle: this.filterData.idCalle.idCalle,
              habitantes: this.filterData.habitantes
            };
            //console.log("this.objectFilter:", this.objectFilter);
            this.articuloService
              .getItemsBySearch(this.objectFilter)
              .then(data => {
                this.articulos = data.propiedades;
                //console.log("this.articulos:", this.articulos);
                this.arbol = data.arbol;
                //console.log("this.arbol:", this.arbol);
                this.propiedadesInPromise = false;
                // this.articuloService.completeSubjects();
                // this.articuloService.newSubjects();
                // this.articuloService.filter..complete()();
              })
              .catch(error => {
                this.propiedadesInPromise = false;
                console.error(error);
              });
          }
        });
      }
    });
  }

  verifyStringOrObject() {
    let value = "";
    let data = this.filterData;
    if (data) {
      data.idTipoPropiedad && data.idTipoPropiedad.idTipoPropiedad
        ? (value = value + data.idTipoPropiedad.descripcion + " / ")
        : "";
      data.idMonedas && data.idMonedas.idMonedas
        ? (value = value + data.idMonedas.moneda + " / ")
        : "";
      data.idTipoOperaion && data.idTipoOperaion.idTipoOperaion
        ? (value = value + data.idTipoOperaion.descripcion + " / ")
        : "";
      data.montoMinimo && data.montoMinimo != null
        ? (value = value + data.montoMinimo + " / ")
        : "";
      data.montoMaximo && data.montoMaximo != null
        ? (value = value + data.montoMaximo + " / ")
        : "";
      data.idProvincia && data.idProvincia.id
        ? (value = value + data.idProvincia.nombre + " / ")
        : "";
      data.idPartido && data.idPartido.id
        ? (value = value + data.idPartido.nombre + " / ")
        : "";
      data.idLocalidad && data.idLocalidad.id
        ? (value = value + data.idLocalidad.nombre + " / ")
        : "";
      data.idBarrio && data.idBarrio.id
        ? (value = value + data.idBarrio.nombre + +" / ")
        : "";

      data.idCalle && data.idCalle.idCalle
        ? (value = value + data.idCalle.nombre + +" / ")
        : "";
      data.Ambientes_Cochera ? (value = value + "Con cochera / ") : "";
    }
    return value;
  }

  goBack() {
    this.articuloService.search.next(false);
    window.scroll(0, 0);
  }

  removeChip(opcion: string) {
    //Vaciamos la escalera de la direccion en caso de eliminar algun chip
    if (opcion == "idProvincia") {
      this.objectFilter.idPartido = null;
      this.filterData.idPartido = null;
    }
    if (opcion == "idProvincia" || opcion == "idPartido") {
      this.objectFilter.idLocalidad = null;
      this.filterData.idLocalidad = null;
    }
    if (
      opcion == "idProvincia" ||
      opcion == "idPartido" ||
      opcion == "idLocalidad"
    ) {
      this.filterData.idBarrio = null;
      this.filterData.idCalle = null;
      this.objectFilter.idBarrio = null;
      this.objectFilter.idCalle = null;
    }
    if (opcion == "minM2") {
      this.minM2 = null;
    }
    if (opcion == "maxM2") {
      this.maxM2 = null;
    }
    if (opcion == "montoMinimo") {
      this.montoMinimo = null;
    }
    if (opcion == "montoMaximo") {
      this.montoMaximo = null;
    }
    this.objectFilter[opcion] = null;
    this.filterData[opcion] = null;
    // this.articuloService.search.next(true);
    this.propiedadesInPromise = true;
    console.log("this.objectFilter:", this.objectFilter);
    this.articuloService
      .getItemsBySearch(this.objectFilter)
      .then(data => {
        this.articulos = data.propiedades;
        this.arbol = data.arbol;
        this.propiedadesInPromise = false;
      })
      .catch(error => {
        this.propiedadesInPromise = false;
        console.error(error);
      });
    // this.articuloService.filter.next(this.objectFilter);
  }

  setFilter(opcion: string, value: any) {
    switch (opcion) {
      case "idProvincia":
        this.objectFilter[opcion] = value.id;
        this.filterData[opcion] = value;
        break;
      case "idPartido":
        this.objectFilter[opcion] = value.id;
        this.filterData[opcion] = value;
        break;
      case "idLocalidad":
        this.objectFilter[opcion] = value.id;
        this.filterData[opcion] = value;
        break;
      case "idBarrio":
        this.objectFilter[opcion] = value.id;
        this.filterData[opcion] = value;
        break;
      case "idCalle":
        this.objectFilter[opcion] = value.idCalle;
        this.filterData[opcion] = value;
        break;
      case "montos":
        this.objectFilter["montoMinimo"] = value.montoMinimo;
        this.objectFilter["montoMaximo"] = value.montoMaximo;
        this.filterData["montoMinimo"] = value.montoMinimo;
        this.filterData["montoMaximo"] = value.montoMaximo;
        break;
      case "metros":
        this.objectFilter["minM2"] = value.minM2;
        this.objectFilter["maxM2"] = value.maxM2;
        this.filterData["minM2"] = value.minM2;
        this.filterData["maxM2"] = value.maxM2;
        break;
      default:
        this.objectFilter[opcion] = value;
        this.filterData[opcion] = value;
        break;
    }
    if ((!this.minM2 && !this.maxM2) || this.minM2 < this.maxM2) {
      this.propiedadesInPromise = true;
      console.log("this.objectFilter:", this.objectFilter);
      this.articuloService
        .getItemsBySearch(this.objectFilter)
        .then(data => {
          this.articulos = data.propiedades;
          this.arbol = data.arbol;
          this.propiedadesInPromise = false;
        })
        .catch(error => {
          this.propiedadesInPromise = false;
          console.error(error);
        });
    }

    // this.articuloService.search.next(true);
    // this.articuloService.filter.next(this.objectFilter);
  }

  onClickPublicacion() {
    this.articuloService.search.next(false);
  }
}
