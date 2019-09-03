import { Component, OnInit } from '@angular/core';
import { IConfigG } from "src/app/servicios/interfaces.index";
import { ConfiguracionGeneralService, SucursalesService, ArticuloService } from "src/app/servicios/servicios.index";
import {
  ActivatedRoute,
  Router,
  Event,
  NavigationStart
} from "@angular/router";

@Component({
  selector: 'app-about',
  templateUrl: './about.component.html',
  styleUrls: ['./about.component.scss']
})

export class AboutComponent implements OnInit {
  mCategoria = {configGeneral:{}} as IConfigG;
  searchClicked: boolean;

  
  constructor(
    private router: Router,
    private _ConfiguracionGeneral: ConfiguracionGeneralService,
    public articuloService: ArticuloService,
    private _SucursalesService: SucursalesService
    ) { 

    this.mCategoria;
    this.getAll();
  }

  ngOnInit() {
    this.articuloService.search.subscribe(data => {
      this.searchClicked = data;
    });
    this.resetSearchResult();
  }
  resetSearchResult() {
    // si se realizó una busqueda en  el buscador, se borra la busqueda al cambiar a esta pagina
    this.router.events.subscribe((event: Event) => {
      if (event instanceof NavigationStart) {
        this.articuloService.search.next(false);
        window.scroll(0, 0);
      }
    });
  }
  getAll() {
    this._ConfiguracionGeneral
      .All()
      .then(data => {
        this.mCategoria = data;
      })
      .catch(error => {
        console.log(error);
      });
  }
}

