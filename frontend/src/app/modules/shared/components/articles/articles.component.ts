import { Component, OnInit } from "@angular/core";
import { ArticuloService } from "../../../../servicios/servicios.index";
import { montos } from "../search/mockData";
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

  constructor(private articulosService: ArticuloService) {
    articulosService.filter.subscribe(filterData => {
      //Obtenemos el filtro del buscador
      this.filterData = filterData;
      this.objectFilter = {
        idTipoPropiedad: this.filterData.idTipoPropiedad.idTipoPropiedad,
        idMonedas: this.filterData.idMonedas.idMonedas,
        idTipoOperaion: this.filterData.idTipoOperaion.idTipoOperaion,
        montoMinimo:
          this.filterData.montoMinimo == "Indistinto"
            ? null
            : this.filterData.montoMinimo,
        montoMaximo:
          this.filterData.montoMaximo == "Indistinto"
            ? null
            : this.filterData.montoMaximo,
        idProvincia: this.filterData.idProvincia.id,
        idPartido: this.filterData.idPartido.id,
        idLocalidad: this.filterData.idLocalidad.id,
        idBarrio: this.filterData.idBarrio.id,
        habitantes: this.filterData.habitantes
      };
      articulosService
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
    });
  }
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
  }

  verifyStringOrObject() {
    let value = "";
    let data = this.filterData;
    if (data) {
      data.idTipoPropiedad && data.idTipoPropiedad.idTipoPropiedad
        ? (value = value + data.TipoPropiedad.descripcion + " / ")
        : "";
      data.idMoneda && data.idMoneda.idMonedas
        ? (value = value + data.idMoneda.moneda + " / ")
        : "";
      data.idTipoOperaion && data.idTipoOperaion.idTipoOperaion
        ? (value = value + data.idTipoOperaion.descripcion + " / ")
        : "";
      data.montoMinimo && data.montoMinimo != "Indistinto"
        ? (value = value + data.montoMinimo + " / ")
        : "";
      data.montoMaximo && data.montoMaximo != "Indistinto"
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
    }
    return value;
  }

  goBack() {
    
    this.articulosService.search.next(false);
    window.scroll(0, 0);
  }

  removeChip(opcion: string) {
    //Vaciamos la escalera de la direccion en caso de eliminar algun chip
    if (opcion == "idProvincia") {
      this.objectFilter.idPartido = null;
      this.filterData.idPartido=null;
    }
    if (opcion == "idProvincia" || opcion == "idPartido") {
      this.objectFilter.idLocalidad = null;
      this.filterData.idLocalidad=null;
    }
    if (
      opcion == "idProvincia" ||
      opcion == "idPartido" ||
      opcion == "idLocalidad"
    ) {
      this.filterData.idBarrio = null;
      this.objectFilter.idBarrio = null;
    }
    
    this.objectFilter[opcion] = null;
    this.filterData[opcion] = null;
    this.articulosService.search.next(true);
    this.articulosService
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
    // this.articulosService.filter.next(this.objectFilter);
  }

  setFilter(opcion: string, value: any) {
    switch (opcion) {
      case 'zona':
        this.objectFilter[opcion] = value.id;
        this.filterData[opcion] = value;
        break;
      default:
        this.objectFilter[opcion] = value;
        this.filterData[opcion] = value;
        break;
    }
    this.articulosService
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
    // this.articulosService.search.next(true);
    // this.articulosService.filter.next(this.objectFilter);
  }

  onClickPublicacion() {
    this.articulosService.search.next(false);
  }
}
