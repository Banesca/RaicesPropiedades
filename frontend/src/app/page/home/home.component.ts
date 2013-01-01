import { Component,Input, OnInit } from '@angular/core';
import { PublicacionesService } from "src/app/servicios/servicios.index";

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent implements OnInit {
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
            console.log(this.mCategorias);
    
          })
          .catch(error => {
            console.log(this.mCategorias);
          });
      }
}
