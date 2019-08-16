import { Component, OnInit } from '@angular/core';
import { ArticuloService } from '../../../../servicios/servicios.index'
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
  public recomendation = [1, 2, 3, 4];
  propiedadesInPromise: boolean = false;

  filterData: any;
  constructor(private articulosService: ArticuloService) {

    articulosService.filter.subscribe(filterData => {
      //Obtenemos el filtro del buscador
      this.filterData = filterData;
      //Parseamos la data para que se use en el api
      let objConsulta = {
        idTipoPropiedad: filterData.TipoPropiedad && filterData.TipoPropiedad.idTipoPropiedad ? filterData.TipoPropiedad.idTipoPropiedad : '',
        idMonedas: filterData.Moneda && filterData.Moneda.idMonedas ? filterData.Moneda.idMonedas : '',
        idTipoOperaion: filterData.TipoOperaion && filterData.TipoOperaion.idTipoOperaion ? filterData.TipoOperaion.idTipoOperaion : '',
        montoMinimo: filterData.montoMinimo ? filterData.montoMinimo : '',
        montoMaximo: filterData.montoMaximo ? filterData.montoMaximo : '',
        idProvincia: filterData.Provincia && filterData.Provincia.id ? filterData.Provincia.id : '',
        idPartido: filterData.Partido.id && filterData.Partido.id ? filterData.Partido.id : '',
        idLocalidad: filterData.Localidad && filterData.Localidad.id ? filterData.Localidad.id : '',
        idBarrio: filterData.Barrio && filterData.Barrio.id ? filterData.Barrio.id : ''
      }

      this.propiedadesInPromise = true;
      articulosService.getItemsBySearch(objConsulta).then(data => {
        this.articulos = data.propiedades;
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
}
