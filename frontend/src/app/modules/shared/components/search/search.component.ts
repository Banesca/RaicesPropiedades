import { Component, OnInit } from '@angular/core';
import { ArticuloService } from "src/app/servicios/servicios.index";
import { IMonedas, IOrientacion, ITipoPropiedad, Monedas, TipoPropiedad } from "src/app/servicios/interfaces.index";
import { Router } from '@angular/router';

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
  styleUrls: ['./search.component.scss']
})

export class SearchComponent implements OnInit {
  mMonedas: IMonedas;
  mOrientacion: IOrientacion;
  mTipoPropiedad: ITipoPropiedad;
  tipo: ITipoPropiedad;
  moneda: IMonedas;

  constructor(private _ArticuloService: ArticuloService, private router: Router ) { 
    this.getAll()
    this.moneda = Monedas.empy();
    this.tipo = TipoPropiedad.empy();
  }

  ngOnInit() {
  }

  getAll(){
    this.gMonedas();
    this.gOrientacion();
    this.gTipoPropiedad();
  }

  gMonedas() {
    this._ArticuloService
      .getMonedas()
        .then(data => {
       this.mMonedas = data
       console.log(this.mMonedas);
      })
      .catch(error => {
        console.log(error);
      });
  }

  gOrientacion() {
    this._ArticuloService
      .getOrientacion()
        .then(data => {
       this.mOrientacion = data
       console.log(this.mOrientacion);
      })
      .catch(error => {
        console.log(error);
      });
    }

      gTipoPropiedad() {
        this._ArticuloService
          .getTipoPropiedad()
            .then(data => {
           this.mTipoPropiedad = data
           console.log(this.mTipoPropiedad);
          })
          .catch(error => {
            console.log(error);
          });
  }

  setTipo(value: ITipoPropiedad){
    this.tipo = value;
  }
  setMoneda(value: IMonedas){
    this.moneda = value;
  }

  searchFilter(){
    this._ArticuloService.filter = [];
    this._ArticuloService.filter.push(this.tipo,this.moneda);
    this.router.navigate(['buscador']);
    console.log(this._ArticuloService.filter)  
  }


}
