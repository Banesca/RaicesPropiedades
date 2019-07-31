import { Component,Input, OnInit } from '@angular/core';
import { PublicacionesService } from "src/app/servicios/servicios.index";

@Component({
  selector: 'app-propiertys-list',
  templateUrl: './propiertys-list.component.html',
  styleUrls: ['./propiertys-list.component.scss']
})
  export class PropiertysListComponent implements OnInit {
  @Input() name;
  public baseUrl: string = '../buscador/detail/'

  mContacto: any[];
  mCategorias: any;
  mLoading = false;

  constructor(
     private _PublicacionesService: PublicacionesService,

    ) {     
      this.getAll();
    }

  ngOnInit() {

  }
      getAll() {
        this._PublicacionesService
          .All()
            .then(data => {
            this.mCategorias = data;    
          })
          .catch(error => {
            console.log(error);
          });
      }
}





