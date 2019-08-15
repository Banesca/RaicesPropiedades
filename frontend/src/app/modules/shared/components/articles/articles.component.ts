import { Component, OnInit  } from '@angular/core';
import {ArticuloService} from '../../../../servicios/servicios.index'
@Component({
  selector: "app-articles",
  templateUrl: "./articles.component.html",
  styleUrls: ["./articles.component.scss"]
})
export class ArticlesComponent implements OnInit {
  public articulos: number[] = [1, 2, 3, 4, 5, 6, 7, 8, 9];
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

  constructor(private articulosService: ArticuloService) {
    articulosService.filter.subscribe(filterData => {
      articulosService
        .getItemsBySearch(filterData)
        .then(data => {
          console.log(data);
        })
        .catch(error => {
          console.log(error);
        });
    });
  }
  getFormData(filterData) {
    const formData = new FormData();
    filterData.forEach(element => {
      formData.append(Object.keys(element)[0]+"",  Object.values(element)[0]+"");
    });
    return formData;
  }
  ngOnInit() {
    let resultsElement = document.getElementById("resultados-busqueda");
    resultsElement.scrollIntoView();
  }

  verifyStringOrObject = (data: any) => {
    let dato: string;
    if (typeof data === "object") {
      Object.keys(data).map(key => {
        dato = data[key].toString();
      });
    }

    return typeof data === "object" ? dato : data;
  };

  goBack() {
    this.articulosService.search.next(false);
    window.scroll(0, 0);
  }
}
