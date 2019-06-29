import { Component, OnInit } from '@angular/core';
import { PublicacionesService } from "src/app/servicios/servicios.index";
import { ActivatedRoute } from '@angular/router';
import { NgbCarouselConfig } from '@ng-bootstrap/ng-bootstrap';


@Component({
  selector: 'app-layout',
  templateUrl: './layout.component.html',
  styleUrls: ['./layout.component.scss']
})
export class LayoutComponent implements OnInit  {
  gPropiedades: any;
  status: boolean;
  mId: string;
  mLoading = false;


  constructor(private _PublicacionesService: PublicacionesService, config: NgbCarouselConfig,
    private _ActivatedRoute: ActivatedRoute ) {
    this.gPropiedades;
    this._ActivatedRoute.params.subscribe(param => {
      this.mId = param['ruta'];
    });
    this.GetPublicacionUrl()
    config.interval = 10000;
    config.wrap = false;
    config.keyboard = false;
    config.pauseOnHover = false;
    config.showNavigationIndicators = false;
  }

  ngOnInit() {
  }



  GetPublicacionUrl() {
    this._PublicacionesService.getPublicacion(this.mId).then
    (data => {
      console.log(data)
      this.gPropiedades = data;
      console.log(this.gPropiedades)
      console.log(this.mId)
    })

    
      .catch(error => {
        console.log(this.gPropiedades);
        console.log(this.mId)
      });
  }

}