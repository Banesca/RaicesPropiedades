import { Component, OnInit } from '@angular/core';
import { ArticuloService } from '../../../../servicios/servicios.index'
import { montos } from '../search/mockData';
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
  selectedMinimo: Number | string = 'mínimo';
  selectedMaximo: Number | string = 'máximo';
  montos: number[] = montos;

  constructor(private articulosService: ArticuloService) {

    articulosService.filter.subscribe(filterData => {
      console.log('subscribe');
      //Obtenemos el filtro del buscador
      this.filterData = filterData;
      //Parseamos la data para que se use en el api
      let objConsulta = {
        idTipoPropiedad: filterData.TipoPropiedad && filterData.TipoPropiedad.idTipoPropiedad ? filterData.TipoPropiedad.idTipoPropiedad : '',
        idMonedas: filterData.Moneda && filterData.Moneda.idMonedas ? filterData.Moneda.idMonedas : '',
        idTipoOperaion: filterData.TipoOperaion && filterData.TipoOperaion.idTipoOperaion ? filterData.TipoOperaion.idTipoOperaion : '',
        montoMinimo: filterData.montoMinimo && filterData.montoMinimo != 'Indistinto' ? filterData.montoMinimo : '',
        montoMaximo: filterData.montoMaximo && filterData.montoMaximo != 'Indistinto' ? filterData.montoMaximo : '',
        idProvincia: filterData.Provincia && filterData.Provincia.id ? filterData.Provincia.id : '',
        idPartido: filterData.Partido && filterData.Partido.id ? filterData.Partido.id : '',
        idLocalidad: filterData.Localidad && filterData.Localidad.id ? filterData.Localidad.id : '',
        idBarrio: filterData.Barrio && filterData.Barrio.id ? filterData.Barrio.id : ''
      }

      this.propiedadesInPromise = true;
      this.selectedMinimo = objConsulta.montoMinimo ? objConsulta.montoMinimo : 'mínimo';
      this.selectedMaximo = objConsulta.montoMaximo ? objConsulta.montoMaximo : 'máximo';

      articulosService.getItemsBySearch(objConsulta).then(data => {
        console.log("getItemsBySearch",data);
        this.articulos = data.propiedades;
        this.arbol = data.arbol;
        this.propiedadesInPromise = false;
      }).catch(error => {
        this.propiedadesInPromise = false;
        console.error(error);
      });
    });

  }
  getFormData(filterData) {
    const formData = new FormData();
    filterData.forEach(element => {
      formData.append(Object.keys(element)[0] + "", Object.values(element)[0] + "");
    });
    return formData;
  }
  ngOnInit() {
    let resultsElement = document.getElementById("resultados-busqueda");
    resultsElement.scrollIntoView();
  }

  verifyStringOrObject() {
    let value = '';
    let data = this.filterData;
    if (data) {
      data.TipoPropiedad && data.TipoPropiedad.idTipoPropiedad ? value = value + data.TipoPropiedad.descripcion + ' / ' : '';
      data.Moneda && data.Moneda.idMonedas ? value = value + data.Moneda.moneda + ' / ' : '';
      data.TipoOperaion && data.TipoOperaion.idTipoOperaion ? value = value + data.TipoOperaion.descripcion + ' / ' : '';
      data.montoMinimo && data.montoMinimo != 'Indistinto' ? value = value + data.montoMinimo + ' / ' : '';
      data.montoMaximo && data.montoMaximo != 'Indistinto' ? value = value + data.montoMaximo + ' / ' : '';
      data.Provincia && data.Provincia.id ? value = value + data.Provincia.nombre + ' / ' : '';
      data.Partido && data.Partido.id ? value = value + data.Partido.nombre + ' / ' : '';
      data.Localidad && data.Localidad.id ? value = value + data.Localidad.nombre + ' / ' : '';
      data.Barrio && data.Barrio.id ? value = value + data.Barrio.nombre + + ' / ' : ''
    }
    return value
  }

  goBack() {
    this.articulosService.search.next(false);
    window.scroll(0, 0);
  }

  removeChip(opcion: string) {

    //Vaciamos la escalera de la direccion en caso de eliminar algun chip
    if (opcion == 'Provincia') {
      this.filterData.Partido = null;
    }
    if (opcion == 'Provincia' || opcion == 'Partido') {
      this.filterData.Localidad = null;
    }
    if (opcion == 'Provincia' || opcion == 'Partido' || opcion == 'Localidad') {
      this.filterData.Barrio = null;
    }

    this.filterData[opcion] = null;
    this.articulosService.search.next(true);
    this.articulosService.filter.next(this.filterData);
  }

  setFilter(opcion: string, value: any) {
    this.filterData[opcion] = value;
    this.articulosService.search.next(true);
    this.articulosService.filter.next(this.filterData);
  }

  onClickPublicacion() {
    this.articulosService.search.next(false);
  }
}
