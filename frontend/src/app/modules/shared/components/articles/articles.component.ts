import { Component, OnInit  } from '@angular/core';
import {ArticuloService} from '../../../../servicios/servicios.index'
@Component({
  selector: 'app-articles',
  templateUrl: './articles.component.html',
  styleUrls: ['./articles.component.scss']
})
export class ArticlesComponent implements OnInit  {


  public articulos :number[] = [1,2,3,4,5,6,7,8,9]
  public filtro : any
  public filtro2 = ['Alquiler' , 'casas' , 'dolares', 'Pdo Pillar', 'Norte GranB Area' , 'country B Cerrado']
  public recomendation = [1,2,3,4]

  constructor(articulosService: ArticuloService) { 
    articulosService.filter.subscribe(filterData=>{
      this.filtro = filterData
    })
  }

  ngOnInit() {

    let resultsElement = document.getElementById('resultados-busqueda');
    resultsElement.scrollIntoView();

  }


  verifyStringOrObject=(data: any) =>{
    let dato :string;
    if(typeof data === 'object'){
      Object.keys(data).map( key =>{
        dato = data[key].toString()
      })
    }
     
   return typeof data === 'object' ? dato : data
  }
}
