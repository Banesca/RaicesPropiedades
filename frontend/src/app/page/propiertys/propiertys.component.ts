import { Component, Input, OnInit } from '@angular/core';
import { PublicacionesService, ArticuloService } from "src/app/servicios/servicios.index";

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
  searchClicked: boolean;

  constructor(
    private _PublicacionesService: PublicacionesService,
    public articuloService: ArticuloService,
  ) { }

  ngOnInit() {

    this.articuloService.search.subscribe(data => {
      this.searchClicked = data;
    });

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
