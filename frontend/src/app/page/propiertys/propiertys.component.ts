import { Component,Input, OnInit } from '@angular/core';
import { PublicacionesService } from "src/app/servicios/servicios.index";

@Component({
  selector: 'app-propiertys',
  templateUrl: './propiertys.component.html',
  styleUrls: ['./propiertys.component.scss']
})
export class PropiertysComponent implements OnInit {
  @Input() name;
  public baseUrl: string = '../buscador/detail/';

  mContacto: any[];
  mCategorias: any;
  mLoading = false;

  constructor(private _PublicacionesService: PublicacionesService) {}

  ngOnInit() {
    this.getAll();
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
