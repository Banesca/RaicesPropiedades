import { Component, Input, OnInit } from '@angular/core';
import { PublicacionesService, ArticuloService, GaleriaHomeService } from "src/app/servicios/servicios.index";

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
  galeriaHome: any;

  constructor(
    private _PublicacionesService: PublicacionesService,
    public articuloService: ArticuloService,
    private _GaleriaHomeService: GaleriaHomeService
  ) { }
  

  ngOnInit() {

    this.articuloService.search.subscribe(data => {
      this.searchClicked = data;
    });

    this.getAll();
    this.getGaleriaHome();
  }
      getAll() {
        this._PublicacionesService
          .All()
            .then(data => {
            this.mCategorias = data;
            console.log('mCategorias',this.mCategorias);
          })
          .catch(error => {
            console.log(error);
          });
      }
      getGaleriaHome(){
    this._GaleriaHomeService
      .All()
        .then(res => {
       this.galeriaHome = res.data
      })
      .catch(error => {
        console.log(error);
      });
  }
}
